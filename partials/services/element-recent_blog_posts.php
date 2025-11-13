<?php

  $title = get_sub_field('title');
  $sub_title = get_sub_field('sub_title');
  $posts = get_sub_field('posts');
  $section_link = get_sub_field('section_link');
  $visability = get_sub_field('visability');

?>

<section class="container-wrap recent-blog-posts service-recent-blog-posts<?php if ($visability == 'hidden') { echo ' hidden'; }?>">

  <div class="container-custom">
    <div class="recent-blog-posts-wrap">
      <?php if (!empty($title)): ?><h3 class="title"><?php echo $title; ?></h3><?php endif; ?>
      <?php if (!empty($sub_title)): ?><h2 class="sub-title"><?php echo $sub_title; ?></h2><?php endif; ?>
      <div class="swiper recent-posts">
        <div class="swiper-wrapper">
          <?php
          if (!empty($posts)) :
            foreach ($posts as $post) :
              setup_postdata($post);
              ?>
              <article class="swiper-slide">
                <div class="post-item">
                  <?php if (has_post_thumbnail($post->ID)) : ?>
                    <div class="post-image">
                      <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" title="<?php echo esc_attr(get_the_title($post->ID)); ?>"></a>
                      <?php
                        $thumbnail_id = get_post_thumbnail_id($post->ID);
                        $title = get_the_title($post->ID);
                        $img_url = get_the_post_thumbnail_url($post->ID) ?: '/wp-content/uploads/2025/05/Vector.png';
                      ?>
                      <img loading="lazy" src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>">
                    </div>
                  <?php endif; ?>
                  <div class="post-content">
                    <div class="post-category">
                      <?php
                        $categories = get_the_category($post->ID);
                        if (!empty($categories)) : ?>
                          <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>">
                            <?php echo esc_html($categories[0]->name); ?>
                          </a>
                      <?php endif; ?>
                    </div>
                    <h3 class="post-title">
                      <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                        <?php echo esc_html(get_the_title($post->ID)); ?>
                      </a>
                    </h3>
                    <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="read-more" title="<?php echo esc_attr(get_the_title($post->ID)); ?>">
                      <?php
                        echo (defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE === 'sk') ? 'Prečítajte si článok' : 'Read more';
                      ?>
                      <span><?php echo esc_html(get_the_title($post->ID)); ?></span>
                    </a>
                  </div>
                </div>
              </article>
              <?php
            endforeach;
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