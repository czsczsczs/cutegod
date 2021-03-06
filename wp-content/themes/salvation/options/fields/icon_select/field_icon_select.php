<?php
class NHP_Options_icon_select extends NHP_Options{	
	
	/**
	 * Field Constructor.
	 *
	 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
	 *
	 * @since NHP_Options 1.0.1
	*/
	function __construct($field = array(), $value ='', $parent){
		
		parent::__construct($parent->sections, $parent->args, $parent->extra_tabs);
		$this->field = $field;
		$this->value = $value;
		//$this->render();
        $this->icons = array(
            'Web Application Icons' => array(
				'adjust', 'anchor', 'archive', 'arrows', 'arrows-h', 'arrows-v', 'asterisk', 'ban', 
				'bar-chart-o', 'barcode', 'bars', 'beer', 'bell', 'bell-o', 'bolt', 'bomb', 'book', 
				'bookmark', 'bookmark-o', 'briefcase', 'bug', 'building', 'building-o', 'bullhorn', 
				'bullseye', 'calendar', 'calendar-o', 'camera', 'camera-retro', 'car', 'caret-square-o-down', 
				'caret-square-o-left', 'caret-square-o-right', 'caret-square-o-up', 'certificate', 'check', 
				'check-circle', 'check-circle-o', 'check-square', 'check-square-o', 'child', 'circle', 
				'circle-o', 'circle-o-notch', 'circle-thin', 'clock-o', 'cloud', 'cloud-download', 
				'cloud-upload', 'code', 'code-fork', 'coffee', 'cog', 'cogs', 'comment', 'comment-o', 
				'comments', 'comments-o', 'compass', 'credit-card', 'crop', 'crosshairs', 'cube', 'cubes', 
				'cutlery', 'database', 'desktop', 'dot-circle-o', 'download', 'ellipsis-h', 'ellipsis-v', 
				'envelope', 'envelope-o', 'envelope-square', 'eraser', 'exchange', 'exclamation', 
				'exclamation-circle', 'exclamation-triangle', 'external-link', 'external-link-square', 'eye', 
				'eye-slash', 'fax', 'female', 'fighter-jet', 'file-archive-o', 'file-audio-o', 'file-code-o', 
				'file-excel-o', 'file-image-o', 'file-pdf-o', 'file-powerpoint-o', 'file-video-o', 'file-word-o', 
				'film', 'filter', 'fire', 'fire-extinguisher', 'flag', 'flag-checkered', 'flag-o', 'flask', 
				'folder', 'folder-o', 'folder-open', 'folder-open-o', 'frown-o', 'gamepad', 'gavel', 'gift', 
				'glass', 'globe', 'graduation-cap', 'hdd-o', 'headphones', 'heart', 'heart-o', 'history', 
				'home', 'inbox', 'info', 'info-circle', 'key', 'keyboard-o', 'language', 'laptop', 
				'leaf', 'lemon-o', 'level-down', 'level-up', 'life-ring', 'lightbulb-o', 'location-arrow', 
				'lock', 'magic', 'magnet', 'male', 'map-marker', 'meh-o', 'microphone', 'microphone-slash', 
				'minus', 'minus-circle', 'minus-square', 'minus-square-o', 'mobile', 'money', 'moon-o', 
				'music', 'paper-plane', 'paper-plane-o', 'paw', 'pencil', 'pencil-square', 'pencil-square-o', 
				'phone', 'phone-square', 'picture-o', 'plane', 'plus', 'plus-circle', 'plus-square', 
				'plus-square-o', 'power-off', 'print', 'puzzle-piece', 'qrcode', 'question', 'question-circle', 
				'quote-left', 'quote-right', 'random', 'recycle', 'refresh', 'reply', 'reply-all', 'retweet', 
				'road', 'rocket', 'rss', 'rss-square', 'search', 'search-minus', 'search-plus', 'share', 
				'share-alt', 'share-alt-square', 'share-square', 'share-square-o', 'shield', 'shopping-cart', 
				'sign-in', 'sign-out', 'signal', 'sitemap', 'sliders', 'smile-o', 'sort', 'sort-alpha-asc', 
				'sort-alpha-desc', 'sort-amount-asc', 'sort-amount-desc', 'sort-asc', 'sort-desc', 
				'sort-numeric-asc', 'sort-numeric-desc', 'space-shuttle', 'spinner', 'spoon', 'square', 
				'square-o', 'star', 'star-half', 'star-half-o', 'star-o', 'suitcase', 'sun-o', 'tablet', 
				'tachometer', 'tag', 'tags', 'tasks', 'taxi', 'terminal', 'thumb-tack', 'thumbs-down', 
				'thumbs-o-down', 'thumbs-o-up', 'thumbs-up', 'ticket', 'times', 'times-circle', 
				'times-circle-o', 'tint', 'trash-o', 'tree', 'trophy', 'truck', 'umbrella', 'university', 
				'unlock', 'unlock-alt', 'upload', 'user', 'users', 'video-camera', 'volume-down', 
				'volume-off', 'volume-up', 'wheelchair', 'wrench' 
			),
            'File Type Icons' => array(
				'file', 'file-archive-o', 'file-audio-o', 'file-code-o', 'file-excel-o', 'file-image-o', 
				'file-o', 'file-pdf-o', 'file-powerpoint-o', 'file-text', 'file-text-o', 'file-video-o', 
				'file-word-o' 
			),
            'Spinner Icons' => array(
				'circle-o-notch', 'cog', 'refresh', 'spinner', 
			),
            'Form Control Icons' => array(
				'check-square', 'check-square-o', 'circle', 'circle-o', 'dot-circle-o', 'minus-square', 
				'minus-square-o', 'plus-square', 'plus-square-o', 'square', 'square-o'
			),
            'Currency Icons' => array(
				'btc', 'eur', 'gbp', 'inr', 'jpy', 'krw', 'money', 'rub', 'try', 'usd', 
			),
            'Text Editor Icons' => array(
				'align-center', 'align-justify', 'align-left', 'align-right', 'bold', 'chain-broken', 
				'clipboard', 'columns', 'eraser', 'file', 'file-o', 'file-text', 'file-text-o', 
				'files-o', 'floppy-o', 'font', 'header', 'indent', 'italic', 'link', 'list', 
				'list-alt', 'list-ol', 'list-ul', 'outdent', 'paperclip', 'paragraph', 'repeat', 
				'scissors', 'strikethrough', 'subscript', 'superscript', 'table', 'text-height', 
				'text-width', 'th', 'th-large', 'th-list', 'underline', 'undo', 
			),
            'Directional Icons' => array(
				'angle-double-down', 'angle-double-left', 'angle-double-right', 'angle-double-up', 'angle-down', 
				'angle-left', 'angle-right', 'angle-up', 'arrow-circle-down', 'arrow-circle-left', 
				'arrow-circle-o-down', 'arrow-circle-o-left', 'arrow-circle-o-right', 'arrow-circle-o-up', 
				'arrow-circle-right', 'arrow-circle-up', 'arrow-down', 'arrow-left', 'arrow-right', 'arrow-up', 
				'arrows', 'arrows-alt', 'arrows-h', 'arrows-v', 'caret-down', 'caret-left', 'caret-right', 
				'caret-square-o-down', 'caret-square-o-left', 'caret-square-o-right', 'caret-square-o-up', 
				'caret-up', 'chevron-circle-down', 'chevron-circle-left', 'chevron-circle-right', 
				'chevron-circle-up', 'chevron-down', 'chevron-left', 'chevron-right', 'chevron-up', 
				'hand-o-down', 'hand-o-left', 'hand-o-right', 'hand-o-up', 'long-arrow-down', 'long-arrow-left', 
				'long-arrow-right', 'long-arrow-up', 
			),
            'Video Player Icons' => array(
				'arrows-alt', 'backward', 'compress', 'eject', 'expand', 'fast-backward', 'fast-forward', 
				'forward', 'pause', 'play', 'play-circle', 'play-circle-o', 'step-backward', 'step-forward', 
				'stop', 'youtube-play', 
			),
			'Brand Icons' => array(
				'adn', 'android', 'apple', 'behance', 'behance-square', 'bitbucket', 'bitbucket-square', 
				'btc', 'codepen', 'css3', 'delicious', 'deviantart', 'digg', 'dribbble', 'dropbox', 
				'drupal', 'empire', 'facebook', 'facebook-square', 'flickr', 'foursquare', 'git', 
				'git-square', 'github', 'github-alt', 'github-square', 'gittip', 'google', 'google-plus', 
				'google-plus-square', 'hacker-news', 'html5', 'instagram', 'joomla', 'jsfiddle', 'linkedin', 
				'linkedin-square', 'linux', 'maxcdn', 'openid', 'pagelines', 'pied-piper', 'pied-piper-alt', 
				'pinterest', 'pinterest-square', 'qq', 'rebel', 'reddit', 'reddit-square', 'renren', 
				'share-alt', 'share-alt-square', 'skype', 'slack', 'soundcloud', 'spotify', 'stack-exchange', 
				'stack-overflow', 'steam', 'steam-square', 'stumbleupon', 'stumbleupon-circle', 'tencent-weibo', 
				'trello', 'tumblr', 'tumblr-square', 'twitter', 'twitter-square', 'vimeo-square', 'vine', 
				'vk', 'weibo', 'weixin', 'windows', 'wordpress', 'xing', 'xing-square', 'yahoo', 
				'youtube', 'youtube-play', 'youtube-square', 
			),
			'Medical Icons' => array(
				'ambulance', 'h-square', 'hospital-o', 'medkit', 'plus-square', 'stethoscope', 'user-md', 
				'wheelchair'
			)
        );
		
	}//function
	
	
	
	/**
	 * Field Render Function.
	 *
	 * Takes the vars and outputs the HTML for the field in the settings
	 *
	 * @since NHP_Options 1.0.1
	*/
	function render(){
		
        // class
		$class = 'class="nhpopts-iconselect '.(isset($this->field['class']) ? $this->field['class'] : '').'"';
		
        // subset
        if (!empty($this->field['subset']) && isset($this->icons[$this->field['subset']])) {
		  $subset = $this->field['subset'];
		  $this->icons = array($this->icons[$subset]);
		}
        
        // allow empty
        $allow_empty = true; // default
        if (isset($this->field['allow_empty']) && ($this->field['allow_empty'] == false || $this->field['allow_empty'] == 'false')) {
            $allow_empty = false;
        }
        
		echo '<select id="'.$this->field['id'].'" name="'.$this->args['opt_name'].'['.$this->field['id'].']" '.$class.' style="width: 100%; max-width: 240px;">';
		if ($allow_empty)
            echo '<option value=""'.selected($this->value, '', false).'>'.__('No Icon', 'mythemeshop').'</option>';
        foreach ( $this->icons as $icon_category => $icons ) {
            if (!isset($subset))
                echo '<optgroup label="'.$icon_category.'">';
            foreach ($icons as $icon) {
                echo '<option value="'.$icon.'"'.selected($this->value, $icon, false).'>'.ucwords(str_replace('-', ' ', $icon)).'</option>';
            }
            echo '</optgroup>';
		}

		echo '</select>';

		echo (isset($this->field['desc']) && !empty($this->field['desc']))?' <span class="description">'.$this->field['desc'].'</span>':'';
		
	}//function
	
    /**
	 * Enqueue Function.
	 *
	 * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
	 *
	 * @since NHP_Options 1.0
	*/
	function enqueue(){
        
        wp_enqueue_script(
			'select2', 
			NHP_OPTIONS_URL.'js/select2.min.js', 
			array('jquery'),
			time(),
			true
		);
        wp_enqueue_script(
			'nhp-opts-field-icon_select-js', 
			NHP_OPTIONS_URL.'fields/icon_select/field_icon_select.js', 
			array('jquery', 'select2'),
			time(),
			true
		);
        wp_enqueue_style(
			'select2', 
			NHP_OPTIONS_URL.'css/select2.css', 
			array(),
			time(),
			'all'
		);

		
	}//function
}//class
?>