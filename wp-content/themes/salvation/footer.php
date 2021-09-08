<?php $mts_options = get_option(MTS_THEME_NAME); ?>
<?php
// default = 3
$top_footer_num = (!empty($mts_options['mts_top_footer_num']) && $mts_options['mts_top_footer_num'] == 4) ? 4 : 3;
?>
    </div><!--#page-->
    <?php
    if ( mts_has_twitter_section() ) :
        $twitt_bg_cover_class = ( $mts_options['mts_homepage_twitter_background_image_cover'] == '1' && $mts_options['mts_homepage_twitter_background_image'] != '' ) ? ' cover-bg' : '';
        $twitt_parallax_class = ( $mts_options['mts_homepage_twitter_parallax'] == '1' ) ? ' parallax-bg' : '';
    ?>
    <div id="twitt" class="section clearfix<?php echo $twitt_bg_cover_class . $twitt_parallax_class; ?>">
        <div class="container">
            <div class="section-title-wrap"><i class="fa fa-twitter"></i></div>
            <?php
            if(empty($mts_options['homepage_twitter_api_key']) || empty($mts_options['homepage_twitter_api_secret']) || empty($mts_options['homepage_twitter_access_token']) || empty($mts_options['homepage_twitter_access_token_secret']) || empty($mts_options['homepage_twitter_username'])){
                echo '<div class="message_box warning"><p>'.__('The section is not configured correctly', 'mythemeshop').'</p></div>'; } else {
                //check if cache needs update
                $mts_twitter_plugin_last_cache_time = get_option('mts_twitter_plugin_last_cache_time');
                $diff = time() - $mts_twitter_plugin_last_cache_time;
                $crt =0* 3600;                      
                //  yes, it needs update            
                //require_once('functions/twitteroauth.php');
                if($diff >= $crt || empty($mts_twitter_plugin_last_cache_time)){                            
                if(!require_once('functions/twitteroauth.php')){ echo '<div class="message_box warning"><p>Couldn\'t find twitteroauth.php!</p></div>'; }                                                        
                
                $connection = mts_getConnectionWithhomepage_twitter_access_token($mts_options['homepage_twitter_api_key'], $mts_options['homepage_twitter_api_secret'], $mts_options['homepage_twitter_access_token'], $mts_options['homepage_twitter_access_token_secret']);
                $tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$mts_options['homepage_twitter_username']."&count=1") or die('Couldn\'t retrieve tweet! Wrong username?');
                if(!empty($tweets->errors)){
                    if($tweets->errors[0]->message == 'Invalid or expired token'){
                        echo '<strong>'.$tweets->errors[0]->message.'!</strong><br />You\'ll need to regenerate it <a href="https://dev.twitter.com/apps" target="_blank">here</a>!';
                    }else{ echo '<strong>'.$tweets->errors[0]->message.'</strong>'; }
                    return;
                }
                for($i = 0;$i <= count($tweets); $i++){
                    if(!empty($tweets[$i])){
                        $tweets_array[$i]['created_at'] = $tweets[$i]->created_at;
                        $tweets_array[$i]['text'] = $tweets[$i]->text;          
                        $tweets_array[$i]['status_id'] = $tweets[$i]->id_str;           
                    }
                }           
                //save tweets to wp option      
                update_option('mts_twitter_plugin_tweets',serialize($tweets_array));                            
                update_option('mts_twitter_plugin_last_cache_time',time());     
                echo '<!-- twitter cache has been updated! -->';
                }

                $mts_twitter_plugin_tweets = maybe_unserialize(get_option('mts_twitter_plugin_tweets'));
                if(!empty($mts_twitter_plugin_tweets)){
                    print '<div class="section-content">';
                        $fctr = '1';
                        foreach($mts_twitter_plugin_tweets as $tweet){  
                            if ($fctr > 1) continue;
                            print mts_convert_links($tweet['text']);
                            $fctr++;
                        }
                    print '</div>';
                    print '<div class="follow-link">';
                    printf( __( 'Follow %s on Twitter', 'mythemeshop' ), '<a class="twitter_username" href="http://twitter.com/'.$mts_options['homepage_twitter_username'].'">@'.$mts_options['homepage_twitter_username'].'</a>' );
                    print '</div>';
                }
            }
            ?>
        </div>
    </div>
    <?php endif; ?>
    <footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
        <div id="footer-widgets" class="clearfix">
            <div class="container">
            <?php if ($mts_options['mts_top_footer']) : ?>
                <div class="footer-widgets top-footer-widgets widgets-num-<?php echo $top_footer_num; ?>">
                    <div class="f-widget f-widget-1">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-top') ) : ?><?php endif; ?>
                    </div>
                    <div class="f-widget f-widget-2">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-top-2') ) : ?><?php endif; ?>
                    </div>
                    <div class="f-widget f-widget-3 <?php echo ($top_footer_num == 3) ? 'last' : ''; ?>">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-top-3') ) : ?><?php endif; ?>
                    </div>
                    <?php if ($top_footer_num == 4) : ?>
                    <div class="f-widget f-widget-4 last">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-top-4') ) : ?><?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div><!--.top-footer-widgets-->
            <?php endif; ?>
            </div><!--.container-->
        </div>
        <div id="footer" class="clearfix">
            <div class="container">
                <div class="copyrights">
                    <?php mts_copyrights_credit(); ?>
                </div>
            </div><!--.container-->
        </div>
    </footer><!--footer-->
</div><!--.main-container-->
<?php mts_footer(); ?>
<?php wp_footer(); ?>
</body>
</html>