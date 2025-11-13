<?php

  $title = get_sub_field('title');
  $sub_title = get_sub_field('sub_title');
  $content = get_sub_field('content');
  $section_link = get_sub_field('section_link');
  $heading_h1 = get_sub_field('heading_h1');
  $visability = get_sub_field('visability');

?>

<section class="container-wrap recent-blog-posts recent-blog-posts-pagination<?php if ($visability == 'hidden') { echo ' hidden'; }?>">

  <div class="container-custom">
    <div class="recent-blog-posts-wrap">
      <?php if (!empty($title)): ?><h3 class="title"><?php echo $title; ?></h3><?php endif; ?>
      <?php if (!empty($sub_title)): ?>
        <?php if ($heading_h1 == 'yes'): ?>
          <h1 class="sub-title"><?php echo $sub_title; ?></h1>
        <?php else: ?>
          <h2 class="sub-title"><?php echo $sub_title; ?></h2>
        <?php endif; ?>
      <?php endif; ?>
      <?php if (!empty($content)): ?><div class="content"><?php echo $content; ?></div><?php endif; ?>
      <div class="recent-posts">
        <?php
          $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
          $posts_per_page = 6;
          $args = array(
            'posts_per_page' => $posts_per_page,
            'post_status'    => 'publish',
            'post_type'      => 'post',
            'orderby'        => 'date',
            'order'          => 'DESC',
            'paged'          => $paged,
          );

          $recent_posts = new WP_Query( $args );

          if ( $recent_posts->have_posts() ) :
            while ( $recent_posts->have_posts() ) :
              $recent_posts->the_post();
              ?>
                <article class="post-item">
                  <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-image">
                      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"></a>
                      <?php
                        $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                        $title        = get_the_title( get_the_ID() );
                        $img_url      = get_the_post_thumbnail_url( get_the_ID() ) ?: '/wp-content/uploads/2025/05/Vector.png';
                      ?>
                      <img loading="lazy" src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>">
                    </div>
                  <?php endif; ?>
                  <div class="post-content">
                    <div class="post-category">
                      <?php
                        $categories = get_the_category();
                        if ( ! empty( $categories ) ) : ?>
                          <a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>">
                            <?php echo esc_html( $categories[0]->name ); ?>
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
                        echo ( defined( 'ICL_LANGUAGE_CODE' ) && ICL_LANGUAGE_CODE === 'sk' ) ? 'Prečítajte si článok' : 'Read more';
                      ?>
                      <span><?php the_title(); ?></span>
                    </a>
                  </div>
                </article>
              <?php
            endwhile;
            ?>
          </div>
          <?php
            $total_pages = $recent_posts->max_num_pages;
            if ( $total_pages > 1 ) :
          ?>
            <div class="pagination-wrap initial">
              <nav class="navigation pagination" role="navigation">
                <div class="nav-links">
                  <?php
                    echo paginate_links(
                      array(
                        'base' => esc_url( home_url( '/blog/page/%#%/' ) ),
                        'format'    => '?paged=%#%',
                        'mid_size'  => 1,
                        'prev_text' => __( '' ),
                        'next_text' => __( '' ),
                        'current'   => $paged,
                        'total'     => $total_pages,
                      )
                    );
                  ?>
                </div>
              </nav>
            </div>
          <?php endif; ?>
            <?php else : ?>
              <p>No posts found.</p>
            <?php endif; ?>

        <?php wp_reset_postdata(); ?>
      </div>
    </div>
  </div>

</section>
