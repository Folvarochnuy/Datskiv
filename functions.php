<?php
/**
 * Datskiv Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Datskiv
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_DATSKIV_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'datskiv-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_DATSKIV_VERSION, 'all' );
	wp_enqueue_style( 'custom-css', get_stylesheet_directory_uri() . '/css/custom.min.css', array('astra-theme-css'), rand(111, 9999), 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

function child_scripts() {
	wp_enqueue_script(
		'swiper',
		get_stylesheet_directory_uri() . '/js/swiper.min.js',
		array( 'jquery' )
	);
	wp_enqueue_script(
		'custom-script',
		get_stylesheet_directory_uri() . '/js/custom.js',
		array('jquery'),
		rand(111, 9999),
		'all'
	);
}

add_action('wp_enqueue_scripts', 'child_scripts');

# WPML - Add language class to body element
function append_language_class($classes) {
	$classes[] = 'lang-' . ICL_LANGUAGE_CODE;
	return $classes;
}
add_filter('body_class', 'append_language_class');

// Options page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title'    => 'Theme General Settings',
		'menu_title'    => 'Theme Settings',
		'menu_slug'     => 'theme-general-settings',
		'capability'    => 'edit_posts',
		'redirect'      => false
	));

	acf_add_options_sub_page(array(
		'page_title'    => 'Services Sub Menu SK',
		'menu_title'    => 'Services',
		'parent_slug'   => 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title'    => 'Popup form',
		'menu_title'    => 'Popup form',
		'parent_slug'   => 'theme-general-settings',
	));
}

// Custom Menu Services
add_action('wp_footer', 'add_services_to_menu');
function add_services_to_menu() {
	if( have_rows('menu_item', 'option') ):
		?>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				var submenu = $('#menu-item-191 .sub-menu, #menu-item-975 .sub-menu');
				submenu.empty();

				submenu.append('<div class="list-wrap"><ul class="list"></ul></div>');
				var listContainer = submenu.find('.list');

				<?php 
				while( have_rows('menu_item', 'option') ): the_row();
					$icon = get_sub_field('icon');
					$description = get_sub_field('description');
					$post_object = get_sub_field('item');
					
					if ($post_object) {
						$post_title = get_the_title($post_object);
						$post_link = get_permalink($post_object);
					}
					
					$icon_url = $icon ? esc_url($icon['url']) : '';
				?>
					listContainer.append(`
						<li>
							<a href="<?php echo esc_url($post_link); ?>">
								<img src="<?php echo esc_url($icon_url); ?>" alt="Icon" />
								<div class="text">
									<p class="title"><?php echo ($post_title); ?></p>
									<p><?php echo esc_html($description); ?></p>
								</div>
							</a>
						</li>
					`);
				<?php endwhile; ?>
			});
		</script>
		<?php
	endif;
};

// Custom Popup
add_action('wp_footer', 'add_popup_to_footer');
function add_popup_to_footer() {
	$form_content = get_field('form', 'option');
	if ($form_content) {
		$form_content = str_replace(array("\r", "\n"), '', addslashes($form_content));
		?>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				var popupContent = $('<div class="custom-popup" id="custom-popup"></div>');
				var popupContentWpar = $('<div class="custom-popup-wrap"></div>');
				var popupContentForm = $('<div class="custom-popup-form"></div>');
				popupContent.append(popupContentWpar);
				popupContentWpar.append(popupContentForm);
				popupContentForm.append('<div class="close-popup"></div>');
				popupContentForm.append('<?php echo $form_content; ?>');
				$('body').append(popupContent);
			});
		</script>
		<?php
	}
}

// Add url as a class
function add_url_segment_as_body_class($classes) {
	$current_url = $_SERVER['REQUEST_URI'];    
	$url_path = trim(parse_url($current_url, PHP_URL_PATH), '/');    
	$url_segments = explode('/', $url_path);    
	foreach ($url_segments as $segment) {
		if (!empty($segment)) {
			$classes[] = sanitize_html_class($segment);
		}
	}
	return $classes;
}
add_filter('body_class', 'add_url_segment_as_body_class');

// Facebook Pixel
function add_facebook_pixel() {
	?>
	<!-- Meta Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window, document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '635100972662924');
	fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=635100972662924&ev=PageView&noscript=1"
	/></noscript>
	<!-- End Meta Pixel Code -->
	<?php
}
add_action('wp_head', 'add_facebook_pixel');