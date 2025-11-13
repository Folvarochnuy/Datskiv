<?php 

  $post_data = get_sub_field('post_data');
  $content = get_sub_field('content');
  $visability = get_sub_field('visability');

?>

<section class="container-wrap post-content<?php if ($visability == 'hidden') { echo ' hidden'; }?>">

  <div class="container-custom">
    <div class="post-content-wrap">
      <?php if ($post_data == 'yes') : ?>
        <div class="post-top">
          <nav class="breadcrumb">
            <a href="<?php echo home_url(); ?>">
              <?php
                $home_text = (defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE === 'sk') ? 'Domovská' : 'Home';
                echo $home_text;
              ?>
            </a>
            <span class="breadcrumb-separator">/</span>
            <a href="/blog/">Blog</a>
          </nav>
          <h1 class="post-title">
            <?php echo the_title() ?>
          </h1>
          <div class="post-meta">
            <span class="post-date">
              <?php echo get_the_date(); ?>
            </span>
            <span class="post-author">
              <?php
                $author_prefix = (defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE === 'sk') ? 'od' : 'by';
                echo $author_prefix ;
              ?>
              <?php
                $author_id = get_the_author_meta('ID');
                $first_name = get_the_author_meta('first_name', $author_id);
                $last_name = get_the_author_meta('last_name', $author_id);
                echo esc_html(trim($first_name . ' ' . $last_name));
              ?>
            </span>
          </div>
        </div>
      <?php endif; ?>
      <?php if (!empty($content)): ?>
        <div class="post-content">
          <?php echo $content; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>

</section>