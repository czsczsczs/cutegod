<?php
/*-----------------------------------------------------------------------------------*/
/*	AJAX Contact Form - mts_contact_form()
/*-----------------------------------------------------------------------------------*/
class mtscontact {
    public $errors = array();
    public $userinput = array('name' => '', 'email' => '', 'message' => '');
    public $success = false;
    public $email_subject = '';

    public function __construct() {
        add_action('wp_ajax_mtscontact', array($this, 'ajax_mtscontact'));
        add_action('wp_ajax_nopriv_mtscontact', array($this, 'ajax_mtscontact'));
        add_action('init', array($this, 'init'));
        add_action('wp_enqueue_scripts', array($this, 'register_scripts'));
    }
    public function add_fields( $fields ) {
        if ( is_array( $fields ) && !empty( $fields ) ) {
            $this->userinput = $this->userinput + $fields;
        }
    }
    public function subject( $subject = '' ) {
        if ( !empty( $subject ) ) {
            $this->email_subject = $subject;
        } else {
            $this->email_subject = sprintf( __( 'Contact Form Message from %s', 'mythemeshop' ), get_bloginfo('name') );
        }
    }
    public function ajax_mtscontact() {
        if ($this->validate()) {
            if ($this->send_mail()) {
                echo json_encode('success');
                wp_create_nonce( "mtscontact" ); // purge used nonce
            } else {
                // wp_mail() unable to send
                $this->errors['sendmail'] = __('An error occurred. Please contact site administrator.', 'mythemeshop');
                echo json_encode($this->errors);
            }
        } else {
            echo json_encode($this->errors);
        }
        die();
    }
    public function init() {
        // No-js fallback
        if ( !defined( 'DOING_AJAX' ) || !DOING_AJAX ) {
            if (!empty($_POST['action']) && $_POST['action'] == 'mtscontact') {
                if ($this->validate()) {
                    if (!$this->send_mail()) {
                        $this->errors['sendmail'] = __('An error occurred. Please contact site administrator.', 'mythemeshop');
                    } else {
                        $this->success = true;
                    }
                }
            }
        }
    }
    public function register_scripts() {
        wp_register_script('mtscontact', get_template_directory_uri() . '/js/contact.js', array('jquery', 'jquery-ui-core', 'jquery-ui-datepicker'), time(), true);
        wp_localize_script('mtscontact', 'mtscontact', array('ajaxurl' => admin_url('admin-ajax.php')));
    }
    
    private function validate() {
        // check nonce
        if (!check_ajax_referer( 'mtscontact', 'mtscontact_nonce', false )) {
            $this->errors['nonce'] = __('Please try again.', 'mythemeshop');
        }
        
        // check honeypot // must be empty
        if (!empty($_POST['mtscontact_captcha'])) {
            $this->errors['captcha'] = __('Please try again.', 'mythemeshop');
        }
        
        // name field
        $name = trim(str_replace(array("\n", "\r", "<", ">"), '', strip_tags($_POST['mtscontact_name'])));
        if (empty($name)) {
            $this->errors['name'] = __('Please enter your name.', 'mythemeshop');
        }
        
        // email field
        $useremail = trim($_POST['mtscontact_email']);
        if (!is_email($useremail)) {
            $this->errors['email'] = __('Please enter a valid email address.', 'mythemeshop');
        }
        
        // message field
        $message = strip_tags($_POST['mtscontact_message']);
        if (empty($message)) {
            $this->errors['message'] = __('Please enter a message.', 'mythemeshop');
        }

        // phone number field
        $phone = isset($_POST['mtscontact_phone']) ? strip_tags($_POST['mtscontact_phone']) : '';
        //if (empty($phone)) {
            //$this->errors['message'] = __('Please enter a phone number.', 'mythemeshop');
        //}

        // number of people field
        $number = isset($_POST['mtscontact_number']) ? strip_tags($_POST['mtscontact_number']) : '';
        //if (empty($number)) {
            //$this->errors['message'] = __('Please enter a number of people.', 'mythemeshop');
        //}

        // date
        $date = isset($_POST['mtscontact_date']) ? strip_tags($_POST['mtscontact_date']) : '';
        //if (empty($date)) {
            //$this->errors['message'] = __('Please enter a date.', 'mythemeshop');
        //}
        
        // store fields for no-js
        $this->userinput = array('name' => $name, 'email' => $useremail, 'message' => $message, 'phone' => $phone, 'number' => $number, 'date' => $date);
        
        return empty($this->errors);
    }
    private function send_mail() {
        $email_to = get_option('admin_email');
        $email_subject = $this->email_subject;
        $email_message = __('Name:', 'mythemeshop').' '.$this->userinput['name']."\n\n".
                         __('Email:', 'mythemeshop').' '.$this->userinput['email']."\n\n";

        $email_message .= ( isset($this->userinput['phone']) ) ? __('Phone:', 'mythemeshop').' '.$this->userinput['phone']."\n\n" : '';
        $email_message .= ( isset($this->userinput['number']) ) ? __('Number of People:', 'mythemeshop').' '.$this->userinput['number']."\n\n" : '';
        $email_message .= ( isset($this->userinput['date']) ) ? __('Date:', 'mythemeshop').' '.$this->userinput['date']."\n\n" : '';
                         
        $email_message .= __('Message:', 'mythemeshop').' '.$this->userinput['message'];

        return wp_mail($email_to, $email_subject, $email_message);
    }
    public function get_form() {

        wp_enqueue_style('date-time-picker');

        wp_enqueue_script('mtscontact');
        
        $return = '';
        if (!$this->success) {

            $fields = '';
            $fields .= '<input type="text" name="mtscontact_name" value="'.esc_attr($this->userinput['name']).'" id="mtscontact_name" placeholder="'.__('Full Name', 'mythemeshop').'" />';
            $fields .= '<input type="text" name="mtscontact_email" value="'.esc_attr($this->userinput['email']).'" id="mtscontact_email" placeholder="'.__('Email Address', 'mythemeshop').'" />';
            if ( isset( $this->userinput['phone'] ) ) {
                $fields .= '<input type="text" name="mtscontact_phone" value="'.esc_attr($this->userinput['phone']).'" id="mtscontact_phone" placeholder="'.__('Phone Number', 'mythemeshop').'" />';
            }
            if ( isset( $this->userinput['number'] ) ) {
                $fields .= '<input type="text" name="mtscontact_number" value="'.esc_attr($this->userinput['number']).'" id="mtscontact_number" placeholder="'.__('Number of People', 'mythemeshop').'" />';
            }
            if ( isset( $this->userinput['date'] ) ) {
                $fields .= '<input type="text" name="mtscontact_date" value="'.esc_attr($this->userinput['date']).'" id="mtscontact_date" class="mts-datepicker" placeholder="'.__('Reservation Date', 'mythemeshop').'" />';
            }

            $return .= '
        <form method="post" action="" id="mtscontact_form" class="contact-form">
            <input type="text" name="mtscontact_captcha" value="" style="display: none;" />
            <input type="hidden" name="mtscontact_nonce" value="'.wp_create_nonce( "mtscontact" ).'" />
            <input type="hidden" name="action" value="mtscontact" />
            <div class="contact-form-inputs-col contact-form-inputs-col-1">
                '.$fields.'
            </div>
            <div class="contact-form-inputs-col contact-form-inputs-col-2">
                <textarea name="mtscontact_message" id="mtscontact_message" placeholder="'.__('Additional Message', 'mythemeshop').'">'.esc_textarea($this->userinput['message']).'</textarea>
                <input type="submit" value="'.__('Submit', 'mythemeshop').'" id="mtscontact_submit" class="button" />
            </div>
        </form>';
        }
        $return .= '<div id="mtscontact_success"'.($this->success ? '' : ' style="display: none;"').'>'.__('Your message has been sent.', 'mythemeshop').'</div>';
        return $return;
    }
    public function get_errors() {
        $html = '';
        foreach ($this->errors as $error) {
            $html .= '<div class="mtscontact_error">'.$error.'</div>';
        }
        return $html;
    }
}
$mtscontact = new mtscontact;

// Simple wrappers, to be used in template files
function mts_contact_form() {
    global $mtscontact;
    echo $mtscontact->get_errors(); // if there are any
    echo $mtscontact->get_form();
}
function mts_get_contact_form() { // this could be used for shortcode support
    global $mtscontact;
    return $mtscontact->get_errors() . $mtscontact->get_form();
}

function mts_single_event_form() {
    global $mtscontact;
    $mtscontact->add_fields( array('phone' => '', 'number' => '') );
    $mtscontact->subject( get_the_title() );
    echo $mtscontact->get_errors(); // if there are any
    echo $mtscontact->get_form();
}

function mts_event_form() {
    global $mtscontact;
    $mtscontact->add_fields( array('phone' => '', 'number' => '', 'date' => '') );
    echo $mtscontact->get_errors(); // if there are any
    echo $mtscontact->get_form();
}
?>