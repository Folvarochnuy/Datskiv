<?php 

  $title = get_sub_field('title');
  $sub_title = get_sub_field('sub_title');
  $content = get_sub_field('content');
  $team_members = get_sub_field('team_members');
  $section_link = get_sub_field('section_link');
  $visability = get_sub_field('visability');

?>

<section id="team" class="container-wrap team<?php if ($visability == 'hidden') { echo ' hidden'; }?>">

  <div class="team-wrap">
    <div class="container-custom">
      <?php if (!empty($title)): ?><h3 class="title"><?php echo $title; ?></h3><?php endif; ?>
      <?php if (!empty($sub_title)): ?><h2 class="sub-title"><?php echo $sub_title; ?></h2><?php endif; ?>
      <?php if (!empty($content)): ?><div class="content"><?php echo $content; ?></div><?php endif; ?>
      <div class="team-members-wrap">
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
                        $alt = get_the_title($member->ID);
                        $title = get_the_title($member->ID);
                        ?>
                        <img loading="lazy" src="<?php echo get_the_post_thumbnail_url($member->ID) ?: '/wp-content/uploads/2025/05/Vector.png'; ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>">
                    </div>
                  <?php endif; ?>
                  <div class="team-member-info">
                    <a class="team-member-link" href="<?php echo get_permalink($member->ID); ?>">
                      <p class="team-member-title"><?php echo get_the_title($member->ID); ?></p>
                    </a>
                    <div class="team-member-category">
                      <?php 
                        $categories = get_the_terms($member->ID, 'category');
                        if (!empty($categories) && !is_wp_error($categories)) {
                          foreach ($categories as $category) {
                        echo esc_html($category->name);
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
      </div>
      <div class="section-link">
        <?php if (!empty($section_link)): ?>
          <a href="<?php echo esc_url($section_link['url']); ?>">
            <?php echo esc_html($section_link['title']); ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>

</section>