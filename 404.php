<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php astra_primary_class(); ?>>

		<?php #astra_primary_content_top(); ?>

		<?php #astra_404_content_template(); ?>		

		<?php #astra_primary_content_bottom(); ?>
		<div class="container-wrap">
			<div class="container-custom">
				<div class="bread-crumbs">
					<p>404</p>
				</div>
				<div class="content-wrap">
					<div class="left">
						<img src="/wp-content/uploads/2025/05/Logo-Vertical-min.png" title="404" alt="404">
					</div>
					<div class="right">
						<?php
						$locale = get_locale();
						if ( $locale === 'sk_SK' ) {
							echo '<h2>Ups! Niečo sa pokazilo...</h2>';
						} else {
							echo '<h2>Oops! Something went wrong...</h2>';
						}
						?>
						<?php
						$locale = get_locale();
						if ( $locale === 'sk_SK' ) {
							echo '<p>Zadali ste nesprávnu adresu alebo ste klikli na nesprávny odkaz.</p>';
						} else {
							echo '<p>You entered an incorrect address or followed an incorrect link.</p>';
						}
						?>
						<?php
						$locale = get_locale();
						if ( $locale === 'sk_SK' ) {
							echo '<p>Ale nebojte sa, vždy sa môžete vrátiť na hlavnú stránku.</p>';
						} else {
							echo '<p>But dont worry, you can always return to the main page.</p>';
						}
						?>
						<p><a href="/" class="button">
							<?php
							$locale = get_locale();
							if ( $locale === 'sk_SK' ) {
								echo 'Domovská stránka';
							} else {
								echo 'Main page';
							}
							?>
						</a></p>
					</div>
				</div>
			</div>
		</div>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
