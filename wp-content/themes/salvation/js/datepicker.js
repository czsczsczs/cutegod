jQuery(document).ready(function($) {

	$( '#mts-event-start-date' ).datepicker({
        dateFormat: 'mm/dd/yy',
        onClose: function( selectedDate ){
            $( '#mts-event-end-date' ).datepicker( 'option', 'minDate', selectedDate );
        }
    });
    
    $( '#mts-event-end-date' ).datepicker({
        dateFormat: 'mm/dd/yy',
        onClose: function( selectedDate ){
            $( '#mts-event-start-date' ).datepicker( 'option', 'maxDate', selectedDate );
        }
    });

    $('#ui-datepicker-div').wrap('<div class="mts-datepicker"></div>');
});