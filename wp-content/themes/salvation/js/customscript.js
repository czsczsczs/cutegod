jQuery.fn.exists = function(callback) {
  var args = [].slice.call(arguments, 1);
  if (this.length) {
    callback.call(this, args);
  }
  return this;
};

/*! .isOnScreen() returns bool */
jQuery.fn.isOnScreen = function(){

    var win = jQuery(window);

    var viewport = {
        top : win.scrollTop(),
        left : win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height();

    var bounds = this.offset();
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = bounds.top + this.outerHeight();

    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));

};

/*----------------------------------------------------
/* Header Search
/*---------------------------------------------------*/
jQuery(document).ready(function($){
    var $header = $('#header');
    var $input = $header.find('.hideinput, .header-search .fa-search');
    $header.find('.fa-search').hover(function(e){
        $input.addClass('active').focus();
    }, function() {
       
    });
    $('.header-search .hideinput').click(function(e) {
        e.stopPropagation();
    });
}).click(function(e) {
    jQuery('#header .hideinput, .header-search .fa-search').removeClass('active');
});

jQuery(document).ready(function($){
    $('.header-search .fa-search').click(function(e) {
        e.preventDefault();
        e.stopPropagation();
    });
});

/*----------------------------------------------------
/* Scroll to top
/*--------------------------------------------------*/
jQuery(document).ready(function($) {
    //move-to-top arrow
    jQuery("body").prepend("<a href='#' id='move-to-top' class='to-top animate'><i class='fa fa-chevron-up'></i></a>");
    var scrollDes = 'html,body';
    /*Opera does a strange thing if we use 'html' and 'body' together so my solution is to do the UA sniffing thing*/
    if(navigator.userAgent.match(/opera/i)){
        scrollDes = 'html';
    }
    //show ,hide
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 160 && !jQuery('#footer').isOnScreen()) {
            jQuery('#move-to-top').addClass('filling').removeClass('hiding');
        } else {
            jQuery('#move-to-top').removeClass('filling').addClass('hiding');
        }
    });
    // scroll to top when click ( footer .to-top too )
    jQuery('.to-top').click(function(e) {
        e.preventDefault();
        jQuery(scrollDes).animate({
            scrollTop: 0
        },{
            duration :500
        });
    });
});

/*----------------------------------------------------
/* Smooth Scrolling for Anchor Tag like #comments
/*--------------------------------------------------*/
jQuery(document).ready(function($) {
  $('a[href*=#comments]:not([href=#comments])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
        || location.hostname == this.hostname) {

      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

/*----------------------------------------------------
/* Responsive Navigation
/*--------------------------------------------------*/
if ( mts_customscript.nav_menu != 'none') {
    jQuery(document).ready(function($){
        
        var menu_wrapper = $('.primary-navigation')
            .clone().attr('class', 'mobile-menu primary')
            .wrap('<div id="mobile-menu-wrapper" />').parent().hide()
            .appendTo('body');
    
        $('.toggle-mobile-menu').click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            menu_wrapper.show();
            $('body').toggleClass('mobile-menu-active');
        });
        
        // prevent propagation of scroll event to parent
        $(document).on('DOMMouseScroll mousewheel', '#mobile-menu-wrapper', function(ev) {
            var $this = $(this),
                scrollTop = this.scrollTop,
                scrollHeight = this.scrollHeight,
                height = $this.height(),
                delta = (ev.type == 'DOMMouseScroll' ?
                    ev.originalEvent.detail * -40 :
                    ev.originalEvent.wheelDelta),
                up = delta > 0;
        
            var prevent = function() {
                ev.stopPropagation();
                ev.preventDefault();
                ev.returnValue = false;
                return false;
            }
        
            if (!up && -delta > scrollHeight - height - scrollTop) {
                // Scrolling down, but this will take us past the bottom.
                $this.scrollTop(scrollHeight);
                return prevent();
            } else if (up && delta > scrollTop) {
                // Scrolling up, but this will take us past the top.
                $this.scrollTop(0);
                return prevent();
            }
        });
    }).click(function() {
        jQuery('body').removeClass('mobile-menu-active');
    });
}
/*----------------------------------------------------
/*  Dropdown menu
/* ------------------------------------------------- */
jQuery(document).ready(function($) { 
	$('#navigation ul.sub-menu, #navigation ul.children').hide(); // hides the submenus in mobile menu too
	$('#navigation li').hover( 
		function() {
			$(this).children('ul.sub-menu, ul.children').slideDown('fast');
		}, 
		function() {
			$(this).children('ul.sub-menu, ul.children').hide();
		}
	);
});    

/*----------------------------------------------------
/* Scroll to top footer link script
/*--------------------------------------------------*/
jQuery(document).ready(function($){
    jQuery('a[href=#top]').click(function(){
        jQuery('html, body').animate({scrollTop:0}, 'slow');
        return false;
    });
});

/*----------------------------------------------------
/* Social button scripts
/*---------------------------------------------------*/
jQuery(document).ready(function($){
	(function(d, s) {
	  var js, fjs = d.getElementsByTagName(s)[0], load = function(url, id) {
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.src = url; js.id = id;
		fjs.parentNode.insertBefore(js, fjs);
	  };
	jQuery('span.facebookbtn, .facebook_like').exists(function() {
	  load('//connect.facebook.net/en_US/all.js#xfbml=1', 'fbjssdk');
	});
	jQuery('span.gplusbtn').exists(function() {
	  load('https://apis.google.com/js/plusone.js', 'gplus1js');
	});
	jQuery('span.twitterbtn').exists(function() {
	  load('//platform.twitter.com/widgets.js', 'tweetjs');
	});
	jQuery('span.linkedinbtn').exists(function() {
	  load('//platform.linkedin.com/in.js', 'linkedinjs');
	});
	jQuery('span.pinbtn').exists(function() {
	  load('//assets.pinterest.com/js/pinit.js', 'pinterestjs');
	});
	jQuery('span.stumblebtn').exists(function() {
	  load('//platform.stumbleupon.com/1/widgets.js', 'stumbleuponjs');
	});
	}(document, 'script'));
});

/*----------------------------------------------------
/* Crossbrowser input placeholder fix
/*---------------------------------------------------*/
jQuery(document).ready(function($){
    $(function() {
        $('[placeholder]').focus(function() {
            var input = $(this);
            if (input.val() == input.attr('placeholder')) {
                input.val('');
                input.removeClass('placeholder');
            }
        }).blur(function() {
            var input = $(this);
            if (input.val() == '' || input.val() == input.attr('placeholder')) {
                input.addClass('placeholder');
                input.val(input.attr('placeholder'));
            }
        }).blur();
        $('[placeholder]').parents('form').submit(function() {
            $(this).find('[placeholder]').each(function() {
                var input = $(this);
                if (input.val() == input.attr('placeholder')) {
                    input.val('');
                }
            })
        });
    });
});

/*----------------------------------------------------
/* "Play Audio" Button in alt home slider
/*--------------------------------------------------*/
jQuery(document).ready(function($) {

    if ( $('.play-audio').length ) {

        var audioPostTitle = $('.audio-title-container .post-title a'),
            audioPostAuthor = $('.audio-title-container .post-author');

        $( '#homepage-slider' ).on( 'click', '.play-audio', function(e) {

            e.preventDefault();

            var $this = $( this ),
                newSrc = $this.data('audio-src'),
                newTitle = $this.data('post-title'),
                newAuthor = $this.data('post-author'),
                newLink = $this.attr('href'),
                audioTag = $('.audio-player-container').find('audio');

            audioPostTitle.attr('href',newLink).html(newTitle);
            audioPostAuthor.html(newAuthor);
            
            audioTag[0].player.media.setSrc(newSrc);
            audioTag[0].player.media.load();
            audioTag[0].player.media.play();
        });
    }
});