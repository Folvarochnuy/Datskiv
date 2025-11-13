<?php
/**
 * The Template for displaying team member page.	
**/

get_header(); ?>

<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
      <?php while ( have_posts() ) : the_post(); ?>
      <?php
      $post_id = get_the_ID();
      $bio = get_field('bio');
      ?>
      <section class="container-wrap team-member-single">

        <div class="container-custom">
          <div class="team-member-single-wrap">
            <div class="left">
              <h1><?php the_title(); ?></h1>
              <?php if (!empty($bio)): ?>
                <div class="bio">
                  <h2>
                    <?php
                      $locale = get_locale();
                      echo ($locale === 'sk_SK') ? 'Životopis:' : 'Biography:';
                    ?>
                  </h2>
                  <?php echo $bio; ?>
                </div>
              <?php endif; ?>
            </div>
            <div class="right">
              <div class="team-member-image">
                <img src="<?php echo get_the_post_thumbnail_url($member->ID) ?: '/wp-content/uploads/2025/05/Vector.png'; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
              </div>
              <p class="member-name"><?php the_title(); ?></p>
              <div class="team-member-category">
                <?php 
                  $categories = get_the_terms($member->ID, 'category');
                  if (!empty($categories) && !is_wp_error($categories)) {
                    foreach ($categories as $category) {
                  echo '<span>' . esc_html($category->name) . '</span>';
                    }
                  }
                ?>
              </div>
              <div class="team-member-excerpt"><?php echo get_the_excerpt(); ?></div>
              <div class="team-member-social-links">
                <?php 
                $social_links = get_field('social', $member->ID);
                if (!empty($social_links)) {
                  foreach ($social_links as $link) {
                  if (!empty($link['link'])) {
                    $url = $link['link']['url'];
                    $title = $link['link']['title'];
                    echo '<a href="' . esc_url($url) . '" target="_blank">' . esc_html($title) . '</a>';
                  }
                  }
                }
                ?>
              </div>
            </div>
          </div>
          <div class="orher-doctors">
            <h3>
              <?php
                $locale = get_locale();
                echo ($locale === 'sk_SK') ? 'Ďalší lekári:' : 'Other doctors:';
              ?>
            </h3>
            <?php
            $args = array(
              'post_type'      => 'team',
              'posts_per_page' => 3,
              'post__not_in'   => array(get_the_ID()),
              'orderby'        => 'date',
              'order'          => 'ASC',
            );
            $team_query = new WP_Query($args);
            $team_members = $team_query->have_posts() ? $team_query->posts : [];
            ?>

            <div class="swiper team-swiper">
              <div class="swiper-wrapper">
                <?php if (!empty($team_members)): ?>
                  <?php foreach ($team_members as $member): ?>
                    <div class="team-member swiper-slide">
                      <?php if ($member): ?>
                        <div class="team-member-image">
                            <a class="team-member-link" href="<?php echo get_permalink($member->ID); ?>" title="<?php echo esc_attr(get_the_title($member->ID)); ?>"></a>
                            <?php 
                            $thumbnail_id = get_post_thumbnail_id($member->ID);
                            $title = get_the_title($member->ID);
                            ?>
                            <img src="<?php echo get_the_post_thumbnail_url($member->ID) ?: '/wp-content/uploads/2025/05/Vector.png'; ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>">
                        </div>
                      <?php endif; ?>
                      <div class="team-member-info">
                        <a class="team-member-link" href="<?php echo get_permalink($member->ID); ?>">
                          <h4 class="team-member-title"><?php echo get_the_title($member->ID); ?></h4>
                        </a>
                        <div class="team-member-category">
                          <?php 
                            $categories = get_the_terms($member->ID, 'category');
                            if (!empty($categories) && !is_wp_error($categories)) {
                              foreach ($categories as $category) {
                                echo '<span>' . esc_html($category->name) . '</span>';
                              }
                            }
                          ?>
                        </div>
                        <div class="team-member-excerpt">
                          <?php echo wp_trim_words(get_the_excerpt($member->ID), 20); ?>
                        </div>
                        <div class="team-member-social-links">
                          <?php 
                          $social_links = get_field('social', $member->ID);
                          if (!empty($social_links)) {
                            foreach ($social_links as $link) {
                              if (!empty($link['link'])) {
                                $url = $link['link']['url'];
                                $title = $link['link']['title'];
                                echo '<a href="' . esc_url($url) . '" target="_blank">' . esc_html($title) . '</a>';
                              }
                            }
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
              <div class="swiper-pagination"></div>
              <div class="arrows">
                <div class="swiper-button-left custom-arrow"></div>
                <div class="swiper-button-right custom-arrow"></div>
              </div>
            </div>
            <?php wp_reset_postdata(); ?>
          </div>
          <div class="recent-blog-posts">
            <h3>
              <?php
                $locale = get_locale();
                echo ($locale === 'sk_SK') ? 'Nedávne publikácie:' : 'Recent publications:';
              ?>
            </h3>
            <div class="swiper recent-posts">
              <div class="swiper-wrapper">
                <?php
                  $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'order' => 'DESC',
                  );

                  $recent_posts = new WP_Query($args);

                  if ($recent_posts->have_posts()) :
                    while ($recent_posts->have_posts()) : $recent_posts->the_post();
                      ?>
                      <div class="swiper-slide">
                        <div class="post-item">
                          <?php if (has_post_thumbnail()) : ?>
                            <div class="post-image">
                              <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"></a>
                              <?php
                                $thumbnail_id = get_post_thumbnail_id(get_the_ID());
                                $title = get_the_title(get_the_ID());
                                $img_url = get_the_post_thumbnail_url(get_the_ID()) ?: '/wp-content/uploads/2025/05/Vector.png';
                              ?>
                              <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>">
                            </div>
                          <?php endif; ?>
                          <div class="post-content">
                            <div class="post-category">
                              <?php
                                $categories = get_the_category();
                                if (!empty($categories)) : ?>
                                  <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>">
                                    <?php echo esc_html($categories[0]->name); ?>
                                  </a>
                              <?php endif; ?>
                            </div>
                            <h3 class="post-title">
                              <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                              </a>
                            </h3>
                            <div class="post-excerpt">
                              <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="read-more" title="<?php the_title(); ?>"> 
                              <?php
                                echo (defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE === 'sk') ? 'Čítať ďalej' : 'Read more';
                              ?>
                              <span><?php the_title(); ?></span>
                            </a>
                          </div>
                        </div>
                      </div>
                      <?php
                    endwhile;
                    wp_reset_postdata();
                  else :
                    echo '<p>' . __('No recent posts found.', 'your-theme-slug') . '</p>';
                  endif;
                ?>
              </div>
              <div class="swiper-pagination"></div>
              <div class="arrows">
                <div class="swiper-button-left custom-arrow"></div>
                <div class="swiper-button-right custom-arrow"></div>
              </div>
            </div>
          </div>
        </div>

      </section>

      <?php endwhile; ?>
      
     </main><!-- #main -->
    </main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>