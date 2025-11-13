<?php

  $title = get_sub_field('title');
  $sub_title = get_sub_field('sub_title');
  $content = get_sub_field('content');
  $section_link = get_sub_field('section_link');
  $visability = get_sub_field('visability');

?>

<section class="container-wrap recent-blog-posts<?php if ($visability == 'hidden') { echo ' hidden'; }?>">

  <div class="container-custom">
    <div class="recent-blog-posts-wrap">
      <?php if (!empty($title)): ?><h3 class="title"><?php echo $title; ?></h3><?php endif; ?>
      <?php if (!empty($sub_title)): ?><h2 class="sub-title"><?php echo $sub_title; ?></h2><?php endif; ?>
      <?php if (!empty($content)): ?><div class="content"><?php echo $content; ?></div><?php endif; ?>
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
                <article class="swiper-slide">
                  <div class="post-item">
                    <?php if (has_post_thumbnail()) : ?>
                      <div class="post-image">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"></a>
                        <?php
                          $thumbnail_id = get_post_thumbnail_id(get_the_ID());
                          $title = get_the_title(get_the_ID());
                          $img_url = get_the_post_thumbnail_url(get_the_ID()) ?: '/wp-content/uploads/2025/05/Vector.png';
                        ?>
                        <img loading="lazy" src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>">
                      </div>
                    <?php endif; ?>
                    <div class="post-content">
                      <div class="post-category">
                        <?php
                          $categories = get_the_category();
                          if (!empty($categories)) : ?>
                            <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" rel="bookmark">
                              <?php echo esc_html($categories[0]->name); ?>
                            </a>
                        <?php endif; ?>
                      </div>
                      <h3 class="post-title">
                        <a href="<?php the_permalink(); ?>" rel="bookmark">
                          <?php the_title(); ?>
                        </a>
                      </h3>
                      <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                      </div>
                      <a href="<?php the_permalink(); ?>" class="read-more" title="<?php the_title(); ?>"> 
                        <?php
                          echo (defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE === 'sk') ? 'Prečítajte si článok' : 'Read more';
                        ?>
                        <span><?php the_title(); ?></span>
                      </a>
                    </div>
                  </div>
                </article>
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
      <?php if (!empty($section_link)): ?>
        <div class="section-link">
          <a href="<?php echo esc_url($section_link['url']); ?>">
            <?php echo esc_html($section_link['title']); ?>
          </a>
        </div>
      <?php endif; ?>
    </div>
  </div>

</section>