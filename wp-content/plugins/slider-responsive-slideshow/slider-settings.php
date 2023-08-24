<?php
// toggle button CSS
wp_enqueue_style( 'awl-toogle-button-css', SR_PLUGIN_URL . 'css/toogle-button.css' );

// css dropdown toggle
wp_enqueue_style( 'awl-bootstrap-css', SR_PLUGIN_URL . 'css/bootstrap.css' );
wp_enqueue_style( 'awl-font-awesome-css', SR_PLUGIN_URL . 'css/font-awesome.min.css' );

// js
wp_enqueue_script( 'jquery' );
wp_enqueue_script( 'awl-bootstrap-js', SR_PLUGIN_URL . 'js/bootstrap.min.js', array( 'jquery' ), '', true );
?>
<style>
	.slider_settings {
		font-size: 16px !important;
		padding-left: 6px;
		font: initial;
		margin-top: 5px;
		font-weight: 600;
		padding-left:14px;
	}
	/* hide premalink for setting page */
	#comment-link-box, #edit-slug-box {
		display: none;
	}
</style>

<p class="input-text-wrap">
	<p class="bg-title"><?php esc_html_e( '1. Slider Slides Settings', 'slider-responsive-slideshow' ); ?></p>
	<p class="bg-lower-title"><?php esc_html_e( 'A. Slides', 'slider-responsive-slideshow' ); ?></p><br>
	<div class="range-slider">	
		<?php
		if ( isset( $allslidesetting['slides'] ) ) {
			$slides = $allslidesetting['slides'];
		} else {
			$slides = '1';
		}
		?>
		<input id="slides" name="slides" class="range-slider__range" type="range" value="<?php echo esc_html( $slides ); ?>" min="1" step="1" max="10">
		<span class="range-slider__value">0</span>
	</div>
	<p class="slider_settings"><?php esc_html_e( 'Set numbers of slider you want to display at a time like 1, 2, 3, 4, 10', 'slider-responsive-slideshow' ); ?></p>
</p>

<p class="input-text-wrap">
	<p class="bg-lower-title"><?php esc_html_e( 'B. Slide Speed', 'slider-responsive-slideshow' ); ?></p><br>
	<div class="range-slider">
		<?php
		if ( isset( $allslidesetting['srspeed'] ) ) {
			$srspeed = $allslidesetting['srspeed'];
		} else {
			$srspeed = '200';
		}
		?>
		<input id="srspeed" name="srspeed" class="range-slider__range" type="range" value="<?php echo esc_html( $srspeed ); ?>" min="10" step="10" max="1000">
		<span class="range-slider__value">0</span>
	</div>
	<p class="slider_settings"><?php esc_html_e( 'Set slide transition speed in milliseconds like 200, 400, 500, 700, 1000', 'slider-responsive-slideshow' ); ?></p>
</p>

<p class="input-text-wrap">
	<p class="bg-lower-title"><?php esc_html_e( 'C. Slide Margin', 'slider-responsive-slideshow' ); ?></p><br>
	<p class="slider_settings"><?php esc_html_e( 'Buy Premium Version To Get This Feature', 'slider-responsive-slideshow' ); ?><a href="http://awplife.com/account/signup/slider-responsive-slideshow" target="_blank"> <em>Buy Now</em></a></p>
</p>

<p class="input-text-wrap">
	<p class="bg-lower-title"><?php esc_html_e( 'D. Slide Transitions', 'slider-responsive-slideshow' ); ?></p><br>
	<p class="slider_settings"><?php esc_html_e( 'Buy Premium Version To Get This Feature', 'slider-responsive-slideshow' ); ?><a href="http://awplife.com/account/signup/slider-responsive-slideshow" target="_blank"> <em>Buy Now</em></a></p>
</p>
<br>

<div>
	<p class="bg-title"><?php esc_html_e( '2. Slider Auto Play Setting', 'slider-responsive-slideshow' ); ?></p>
	<p class="bg-lower-title"><?php esc_html_e( 'Auto Play', 'slider-responsive-slideshow' ); ?></p>
	<p class="input-text-wrap switch-field em_size_field">
		<?php
		if ( isset( $allslidesetting['autoplay'] ) ) {
			$autoplay = $allslidesetting['autoplay'];
		} else {
			$autoplay = 'true';
		}
		?>
		<input type="radio" name="autoplay" id="autoplay1" value="true" 
		<?php
		if ( $autoplay == 'true' ) {
			echo 'checked=checked';}
		?>
		>
		<label for="autoplay1"><?php esc_html_e( 'Yes', 'slider-responsive-slideshow' ); ?></label>
		<input type="radio" name="autoplay" id="autoplay2" value="false" 
		<?php
		if ( $autoplay == 'false' ) {
			echo 'checked=checked';}
		?>
		>
		<label for="autoplay2"><?php esc_html_e( 'No', 'slider-responsive-slideshow' ); ?></label>
		<p class="slider_settings"><?php esc_html_e( 'Set auto play to slides automatically', 'slider-responsive-slideshow' ); ?></p>
	</p><br>
</div>
<div>
	<p class="bg-title"><?php esc_html_e( '3. Slider Navigation Settings', 'slider-responsive-slideshow' ); ?></p>
	<p class="bg-lower-title"><?php esc_html_e( 'A. Slider Navigation', 'slider-responsive-slideshow' ); ?></p>
	<p class="input-text-wrap switch-field em_size_field">
		<?php
		if ( isset( $allslidesetting['navigation'] ) ) {
			$navigation = $allslidesetting['navigation'];
		} else {
			$navigation = 'false';
		}
		?>
		<input type="radio" name="navigation" id="navigation1" value="true" 
		<?php
		if ( $navigation == 'true' ) {
			echo 'checked=checked';}
		?>
		>
		<label for="navigation1"><?php esc_html_e( 'Yes', 'slider-responsive-slideshow' ); ?></label>
		<input type="radio" name="navigation" id="navigation2" value="false" 
		<?php
		if ( $navigation == 'false' ) {
			echo 'checked=checked';}
		?>
		>
		<label for="navigation2"><?php esc_html_e( 'No', 'slider-responsive-slideshow' ); ?></label>
		<p class="slider_settings"><?php esc_html_e( 'Set slide on mouse hover stop auto play', 'slider-responsive-slideshow' ); ?></p>
	</p>
</div>
<div class="nav_show_hide">
	<p class="input-text-wrap">
		<p class="bg-lower-title"><?php esc_html_e( 'B. Navigation Text For - Next Button', 'slider-responsive-slideshow' ); ?></p><br>&nbsp;&nbsp;
		<?php
		if ( isset( $allslidesetting['navigation_n'] ) ) {
			$navigation_n = $allslidesetting['navigation_n'];
		} else {
			$navigation_n = 'Next';
		}
		?>
		<input type="text" name="navigation_n" id="navigation_n" value="<?php echo esc_html( $navigation_n ); ?>"><br>
		<p class="slider_settings"><?php esc_html_e( 'Set navigation next button text', 'slider-responsive-slideshow' ); ?></p>
	</p>

	<p class="input-text-wrap">
		<p class="bg-lower-title"><?php esc_html_e( 'C. Navigation Text For - Previous Button', 'slider-responsive-slideshow' ); ?></p><br>&nbsp;&nbsp;
		<?php
		if ( isset( $allslidesetting['navigation_p'] ) ) {
			$navigation_p = $allslidesetting['navigation_p'];
		} else {
			$navigation_p = 'Prev';
		}
		?>
		<input type="text" name="navigation_p" id="navigation_p" value="<?php echo esc_html( $navigation_p ); ?>"><br>
		<p class="slider_settings"><?php esc_html_e( 'Set navigation previous button text', 'slider-responsive-slideshow' ); ?></p>
	</p>
</div>
<div>
	<p class="bg-title"><?php esc_html_e( '4. Slider Auto Height Settings', 'slider-responsive-slideshow' ); ?></p>
	<p class="bg-lower-title"><?php esc_html_e( 'Auto Height', 'slider-responsive-slideshow' ); ?></p>
	<p class="input-text-wrap switch-field em_size_field">
		<?php
		if ( isset( $allslidesetting['auto_height'] ) ) {
			$auto_height = $allslidesetting['auto_height'];
		} else {
			$auto_height = 'false';
		}
		?>
		<input type="radio" name="auto_height" id="auto_height1" value="true" 
		<?php
		if ( $auto_height == 'true' ) {
			echo 'checked=checked';}
		?>
		>
		<label for="auto_height1"><?php esc_html_e( 'Yes', 'slider-responsive-slideshow' ); ?></label>
		<input type="radio" name="auto_height" id="auto_height2" value="false" 
		<?php
		if ( $auto_height == 'false' ) {
			echo 'checked=checked';}
		?>
		>
		<label for="auto_height2"><?php esc_html_e( 'No', 'slider-responsive-slideshow' ); ?></label>
		<p class="slider_settings"><?php esc_html_e( 'Set Set slider auto height', 'slider-responsive-slideshow' ); ?></p>
	</p><br>
</div>
<div>
	<p class="bg-title"><?php esc_html_e( '5. Slider Touch Slide Settings', 'slider-responsive-slideshow' ); ?></p>
	<p class="bg-lower-title"><?php esc_html_e( 'Touch Slide', 'slider-responsive-slideshow' ); ?></p>
	<p class="input-text-wrap switch-field em_size_field">
		<?php
		if ( isset( $allslidesetting['touch_slide'] ) ) {
			$touch_slide = $allslidesetting['touch_slide'];
		} else {
			$touch_slide = 'true';
		}
		?>
		<input type="radio" name="touch_slide" id="touch_slide1" value="true" 
		<?php
		if ( $touch_slide == 'true' ) {
			echo 'checked=checked';}
		?>
		>
		<label for="touch_slide1"><?php esc_html_e( 'Enable', 'slider-responsive-slideshow' ); ?></label>
		<input type="radio" name="touch_slide" id="touch_slide2" value="false" 
		<?php
		if ( $touch_slide == 'false' ) {
			echo 'checked=checked';}
		?>
		>
		<label for="touch_slide2"><?php esc_html_e( 'Disable', 'slider-responsive-slideshow' ); ?></label>
		<p class="slider_settings"><?php esc_html_e( 'Set touch slide to slides using mouse drag event', 'slider-responsive-slideshow' ); ?></p>
	</p><br>
</div>
<div>
	<p class="bg-title"><?php esc_html_e( '6. Title & Description Settings', 'slider-responsive-slideshow' ); ?></p>
	<p class="bg-lower-title"><?php esc_html_e( 'A. Show Slide Title Text', 'slider-responsive-slideshow' ); ?></p>
	<p class="input-text-wrap switch-field em_size_field">
		<?php
		if ( isset( $allslidesetting['show_title'] ) ) {
			$show_title = $allslidesetting['show_title'];
		} else {
			$show_title = 'false';
		}
		?>
		<input type="radio" name="show_title" id="show_title1" value="true" 
		<?php
		if ( $show_title == 'true' ) {
			echo 'checked=checked';}
		?>
		>
		<label for="show_title1"><?php esc_html_e( 'Yes', 'slider-responsive-slideshow' ); ?></label>
		<input type="radio" name="show_title" id="show_title2" value="false" 
		<?php
		if ( $show_title == 'false' ) {
			echo 'checked=checked';}
		?>
		>
		<label for="show_title2"><?php esc_html_e( 'No', 'slider-responsive-slideshow' ); ?></label>
		<p class="slider_settings"><?php esc_html_e( 'Set yes or no to display or hide slide title text', 'slider-responsive-slideshow' ); ?></p>
	</p><br>

	<p class="bg-lower-title"><?php esc_html_e( 'B. Show Slide Description Text', 'slider-responsive-slideshow' ); ?></p>
	<p class="input-text-wrap switch-field em_size_field">
		<?php
		if ( isset( $allslidesetting['show_desc'] ) ) {
			$show_desc = $allslidesetting['show_desc'];
		} else {
			$show_desc = 'false';
		}
		?>
		<input type="radio" name="show_desc" id="show_desc1" value="true" 
		<?php
		if ( $show_desc == 'true' ) {
			echo 'checked=checked';}
		?>
		>
		<label for="show_desc1"><?php esc_html_e( 'Yes', 'slider-responsive-slideshow' ); ?></label>
		<input type="radio" name="show_desc" id="show_desc2" value="false" 
		<?php
		if ( $show_desc == 'false' ) {
			echo 'checked=checked';}
		?>
		>
		<label for="show_desc2"><?php esc_html_e( 'No', 'slider-responsive-slideshow' ); ?></label>
		<p class="slider_settings"><?php esc_html_e( 'Set yes or no to display or hide slide title description', 'slider-responsive-slideshow' ); ?></p>
	</p><br>
</div>
<div>
	<p class="bg-title"><?php esc_html_e( '7. Slide Link Settings', 'slider-responsive-slideshow' ); ?></p>
	<p class="bg-lower-title"><?php esc_html_e( 'Show Slide Link', 'slider-responsive-slideshow' ); ?></p>
	<p class="input-text-wrap switch-field em_size_field">
		<?php
		if ( isset( $allslidesetting['show_link'] ) ) {
			$show_link = $allslidesetting['show_link'];
		} else {
			$show_link = 'false';
		}
		?>
		<input type="radio" name="show_link" id="show_link1" value="true" 
		<?php
		if ( $show_link == 'true' ) {
			echo 'checked=checked';}
		?>
		>
		<label for="show_link1"><?php esc_html_e( 'Yes', 'slider-responsive-slideshow' ); ?></label>
		<input type="radio" name="show_link" id="show_link2" value="false" 
		<?php
		if ( $show_link == 'false' ) {
			echo 'checked=checked';}
		?>
		>
		<label for="show_link2"><?php esc_html_e( 'No', 'slider-responsive-slideshow' ); ?></label>
		<p class="slider_settings"><?php esc_html_e( 'Set yes or no to display or hide slide link', 'slider-responsive-slideshow' ); ?></p>
	</p>
	<br>
</div>
<div class="link_show_hide">
	<p class="bg-lower-title"><?php esc_html_e( 'A. Set Link On', 'slider-responsive-slideshow' ); ?></p>
	<p class="input-text-wrap switch-field em_size_field">
		<?php
		if ( isset( $allslidesetting['link_on'] ) ) {
			$link_on = $allslidesetting['link_on'];
		} else {
			$link_on = 'false';
		}
		?>
		<input type="radio" name="link_on" id="link_on1" value="true" 
		<?php
		if ( $link_on == 'true' ) {
			echo 'checked=checked';}
		?>
		>
		<label for="link_on1"><?php esc_html_e( 'On Slide', 'slider-responsive-slideshow' ); ?></label>
		<input type="radio" name="link_on" id="link_on2" value="false" 
		<?php
		if ( $link_on == 'false' ) {
			echo 'checked=checked';}
		?>
		>
		<label for="link_on2"><?php esc_html_e( 'On Custom Text', 'slider-responsive-slideshow' ); ?></label>
		<p class="slider_settings"><?php esc_html_e( 'Set link url on slide or on custom text link', 'slider-responsive-slideshow' ); ?></p>
	</p><br>

	<p class="input-text-wrap">
		<p class="bg-lower-title"><?php esc_html_e( 'B. Custom Slide Link Text', 'slider-responsive-slideshow' ); ?></p><br>&nbsp;&nbsp;
		<?php
		if ( isset( $allslidesetting['link_text'] ) ) {
			$link_text = $allslidesetting['link_text'];
		} else {
			$link_text = 'Visit';
		}
		?>
		<input type="text" name="link_text" id="link_text" value="<?php echo esc_html( $link_text ); ?>" ><br>
		<p class="slider_settings"><?php esc_html_e( 'Set custom text for slide link text', 'slider-responsive-slideshow' ); ?></p>
	</p><br>
</div>
<div>
	<p class="bg-title"><?php esc_html_e( '8. Slider Text Alignment Settings', 'slider-responsive-slideshow' ); ?></p>
	<p class="bg-lower-title"><?php esc_html_e( 'Slider All Text Alignment - Title, Description, Link', 'slider-responsive-slideshow' ); ?></p>
	<p class="input-text-wrap switch-field em_size_field">
		<?php
		if ( isset( $allslidesetting['text_align'] ) ) {
			$text_align = $allslidesetting['text_align'];
		} else {
			$text_align = 'center';
		}
		?>
		<input type="radio" name="text_align" id="text_align1" value="left" 
		<?php
		if ( $text_align == 'left' ) {
			echo 'checked=checked';}
		?>
		>
		<label for="text_align1"><?php esc_html_e( 'Left', 'slider-responsive-slideshow' ); ?></label>
		<input type="radio" name="text_align" id="text_align2" value="center" 
		<?php
		if ( $text_align == 'center' ) {
			echo 'checked=checked';}
		?>
		>
		<label for="text_align2"><?php esc_html_e( 'Center', 'slider-responsive-slideshow' ); ?></label>
		<input type="radio" name="text_align" id="text_align3" value="right" 
		<?php
		if ( $text_align == 'right' ) {
			echo 'checked=checked';}
		?>
		>
		<label for="text_align3"><?php esc_html_e( 'Right', 'slider-responsive-slideshow' ); ?></label>
		<p class="slider_settings"><?php esc_html_e( 'Set text alignment below slides like left, right or center', 'slider-responsive-slideshow' ); ?></p>
	</p>
</div>
<div>
<!-- custom css -->
	<p class="bg-title"><?php esc_html_e( '9. Custom CSS', 'slider-responsive-slideshow' ); ?></p>
	<p class="bg-lower-title"><?php esc_html_e( 'Type Custum CSS', 'slider-responsive-slideshow' ); ?></p>
	<p class="input-text-wrap switch-field em_size_field">
		<?php
		if ( isset( $allslidesetting['custom-css'] ) ) {
			$custom_css = $allslidesetting['custom-css'];
		} else {
			$custom_css = '';
		}
		?>
		<textarea name="custom-css" id="custom-css" style="width: 100%; height: 120px;" placeholder="Type direct CSS code here. Don't use <style>...</style> tag."><?php echo $custom_css; ?></textarea><br>
		<br>
		<p class="slider_settings"><?php esc_html_e( 'Apply own css on image gallery and dont use style tag', 'slider-responsive-slideshow' ); ?></p>
	</p>
	<p class="input-text-wrap">
		<p class="bg-lower-title"><?php esc_html_e( 'A. Slider Bullets', 'slider-responsive-slideshow' ); ?></p><br>
		<p class="slider_settings"><?php esc_html_e( 'Buy Premium Version To Get This Feature', 'slider-responsive-slideshow' ); ?><a href="http://awplife.com/account/signup/slider-responsive-slideshow" target="_blank"> <em>Buy Now</em></a></p>
	</p>
	<p class="input-text-wrap">
		<p class="bg-lower-title"><?php esc_html_e( 'B. Slider Auto Height', 'slider-responsive-slideshow' ); ?></p><br>
		<p class="slider_settings"><?php esc_html_e( 'Buy Premium Version To Get This Feature', 'slider-responsive-slideshow' ); ?><a href="http://awplife.com/account/signup/slider-responsive-slideshow" target="_blank"> <em>Buy Now</em></a></p>
	</p>
	<br>
</div>
<input type="hidden" name="sr-settings" id="sr-settings" value="sr-save-settings">
<?php
	// syntax: wp_nonce_field( 'name_of_my_action', 'name_of_nonce_field' );
	wp_nonce_field( 'sr_save_settings', 'sr_save_nonce' );
?>
<hr>
<style>
	.awp_bale_offer {
		background-image: url("<?php echo esc_url(plugin_dir_url( __FILE__ ). 'image/awp-bale.jpg' );?>");
		background-repeat:no-repeat;
		padding:30px;
	}
	.awp_bale_offer h1 {
		font-size:35px;
		color:#FFFFFF;
	}
	.awp_bale_offer h3 {
		font-size:25px;
		color:#FFFFFF;
	}
</style>
<div class="row awp_bale_offer">
	<div class="">
		<h1>Plugin's Bale Offer</h1>
		<h3>Get All Premium Plugin ( Personal Licence) in just $179 </h3>
		<h3><strike>$399</strike> For $179 Only</h3>
	</div>
<div class="">
	<a href="https://awplife.com/account/signup/all-premium-plugins" target="_blank" class="button button-primary button-hero load-customize hide-if-no-customize">BUY NOW</a>
</div>
</div>
<p class="">
	<br>
	<a href="https://awplife.com/wordpress-plugins/slider-responsive-slideshow-premium/" target="_blank" class="button button-primary button-hero load-customize hide-if-no-customize">Buy Premium Version</a>
	<a href="https://awplife.com/demo/slider-responsive-slideshow-premium/" target="_blank" class="button button-primary button-hero load-customize hide-if-no-customize">Check Live Demo</a>
	<a href="https://awplife.com/demo/slider-responsive-slideshow-premium-admin/" target="_blank" class="button button-primary button-hero load-customize hide-if-no-customize">Try Admin Demo</a>
</p>
<hr>
<p>
	<h1><strong>Try Our Other Free Plugins :</strong></h1><br>
	<a href="https://wordpress.org/plugins/portfolio-filter-gallery/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Portfolio Filter Gallery</a>
	<a href="https://wordpress.org/plugins/new-grid-gallery/" target="_blank" class="button button-primary  load-customize hide-if-no-customize">Grid Gallery</a>
	<a href="https://wordpress.org/plugins/new-social-media-widget/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Social Media</a>
	<a href="https://wordpress.org/plugins/new-image-gallery/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Image Gallery</a>
	<a href="https://wordpress.org/plugins/new-photo-gallery/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Photo Gallery</a>
	<a href="https://wordpress.org/plugins/responsive-slider-gallery/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Responsive Slider Gallery</a>
	<a href="https://wordpress.org/plugins/new-contact-form-widget/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Contact Form Widget</a><br><br>
	<a href="https://wordpress.org/plugins/facebook-likebox-widget-and-shortcode/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Facebook Likebox Plugin</a>
	<a href="https://wordpress.org/plugins/slider-responsive-slideshow/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Slider Responsive Slideshow</a>
	<a href="https://wordpress.org/plugins/new-video-gallery/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Video Gallery</a>
	<a href="https://wordpress.org/plugins/new-facebook-like-share-follow-button/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Facebook Like Share Follow Button</a>
	<a href="https://wordpress.org/plugins/new-google-plus-badge/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Google Plus Badge</a><br><br>
	<a href="https://wordpress.org/plugins/media-slider/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Media Slider</a>
	<a href="https://wordpress.org/plugins/weather-effect/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Weather Effect</a>
	<a href="https://wordpress.org/plugins/wp-flickr-gallery/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Flickr gallery</a>
	<a href="https://wordpress.org/plugins/event-monster/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Event Manager</a>
</p><br>
<!-- Return to Top -->
<a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>

<hr>
<script>

// ===== Scroll to Top ==== 
jQuery(window).scroll(function() {
	if (jQuery(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
		jQuery('#return-to-top').fadeIn(200);    // Fade in the arrow
	} else {
		jQuery('#return-to-top').fadeOut(200);   // Else fade out the arrow
	}
});
jQuery('#return-to-top').click(function() {      // When arrow is clicked
	jQuery('body,html').animate({
		scrollTop : 0                       // Scroll to top of body
	}, 500);
});

//show and hide settings Start............
	// Link Setting start
	var link_show_hide_settings = jQuery('input[name="show_link"]:checked').val();
		//on change to enable & disable  Link Setting
		if(link_show_hide_settings == "true") {
			jQuery('.link_show_hide').show();
		}
		if(link_show_hide_settings == "false") {
			jQuery('.link_show_hide').hide();
		}

		//on change to enable & disable  Link Setting
		jQuery(document).ready(function() {
			jQuery('input[name="show_link"]').change(function(){
				var link_show_hide_settings = jQuery('input[name="show_link"]:checked').val();
				if(link_show_hide_settings == "true") {
					jQuery('.link_show_hide').show();
				}
				if(link_show_hide_settings == "false") {
					jQuery('.link_show_hide').hide();
				}
			});
		});
	//  Link Setting End
		// navigation settings start
		var nav_show_hide_settings = jQuery('input[name="navigation"]:checked').val();
			//on change to enable & disable navigation Setting
			if(nav_show_hide_settings == "true") {
				jQuery('.nav_show_hide').show();
			}
			if(nav_show_hide_settings == "false") {
				jQuery('.nav_show_hide').hide();
			}

			//on change to enable & disable navigation Setting
			jQuery(document).ready(function() {
				jQuery('input[name="navigation"]').change(function(){
					var nav_show_hide_settings = jQuery('input[name="navigation"]:checked').val();
					if(nav_show_hide_settings == "true") {
						jQuery('.nav_show_hide').show();
					}
					if(nav_show_hide_settings == "false") {
						jQuery('.nav_show_hide').hide();
					}
				});
			});
		// navigation settings End
		
		// Auto play settings start
		var ap_show_hide_settings = jQuery('input[name="autoplay"]:checked').val();
			//on change to enable & disable Auto play
			if(ap_show_hide_settings == "true") {
				jQuery('.ap_show_hide').show();
			}
			if(ap_show_hide_settings == "false") {
				jQuery('.ap_show_hide').hide();
			}

			//on change to enable & disable Auto play
			jQuery(document).ready(function() {
				jQuery('input[name="autoplay"]').change(function(){
					var ap_show_hide_settings = jQuery('input[name="autoplay"]:checked').val();
					if(ap_show_hide_settings == "true") {
						jQuery('.ap_show_hide').show();
					}
					if(ap_show_hide_settings == "false") {
						jQuery('.ap_show_hide').hide();
					}
				});
			});
		//  Auto play settings End
	//show and hide settings End......

//dropdown toggle on change effect
jQuery(document).ready(function() {
	//accordion icon
	jQuery(function() {
		function toggleSign(e) {
			jQuery(e.target)
			.prev('.panel-heading')
			.find('i')
			.toggleClass('fa fa-chevron-down fa fa-chevron-up');
		}
		jQuery('#accordion').on('hidden.bs.collapse', toggleSign);
		jQuery('#accordion').on('shown.bs.collapse', toggleSign);

		});
	});

//range slider
	var rangeSlider = function(){
	  var slider = jQuery('.range-slider'),
		  range = jQuery('.range-slider__range'),
		  value = jQuery('.range-slider__value');
		
	  slider.each(function(){

		value.each(function(){
		  var value = jQuery(this).prev().attr('value');
		  jQuery(this).html(value);
		});

		range.on('input', function(){
		  jQuery(this).next(value).html(this.value);
		});
	  });
	};
	rangeSlider();		
	
// start pulse on page load
	function pulseEff() {
	   jQuery('#shortcode').fadeOut(600).fadeIn(600);
	};
	var Interval;
	Interval = setInterval(pulseEff,1500);

	// stop pulse
	function pulseOff() {
		clearInterval(Interval);
	}
	// start pulse
	function pulseStart() {
		Interval = setInterval(pulseEff,1500);
	}
</script>
