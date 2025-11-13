<?php 

  $first_images_row = get_sub_field('first_images_row');
  $second_images_row = get_sub_field('second_images_row');
  $one_image = get_sub_field('one_image');
  $sub_title = get_sub_field('sub_title');
  $content = get_sub_field( 'content');
  $buttons = get_sub_field('buttons');
  $visability = get_sub_field('visability');

?>

<section class="container-wrap banner-with-text<?php if ($visability == 'hidden') { echo ' hidden'; }?>">

  <?php if (!empty($second_images_row) && !empty($first_images_row)) : ?>
    <div class="images-rows-wrap">
      <?php if (!empty($first_images_row)) : ?>
        <div class="for-animation-wrap">
          <div class="first-images-row images-row">
            <?php foreach ($first_images_row as $image) : ?>
              <div class="image">
                <?php
                  $image_title_alt = (defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE === 'sk') 
                    ? 'Datskiv zubná klinika ' . get_the_title() 
                    : 'Datskiv dental clinic ' . get_the_title();
                ?>
                <img src="<?php echo esc_url($image['url']); ?>"  title="<?php echo $image_title_alt; ?>" alt="<?php echo $image_title_alt; ?>" />
              </div>
            <?php endforeach; ?>
            <?php foreach ($first_images_row as $image) : ?>
              <div class="image">
                <?php
                  $image_title_alt = (defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE === 'sk') 
                    ? 'Datskiv zubná klinika ' . get_the_title() 
                    : 'Datskiv dental clinic ' . get_the_title();
                ?>
                <img src="<?php echo esc_url($image['url']); ?>"  title="<?php echo $image_title_alt; ?>" alt="<?php echo $image_title_alt; ?>" />
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if (!empty($second_images_row)) : ?>
        <div class="for-animation-wrap">
          <div class="second-images-row images-row">
            <?php foreach ($second_images_row as $image) : ?>
              <div class="image">
                <?php
                  $image_title_alt = (defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE === 'sk') 
                    ? 'Datskiv zubná klinika ' . get_the_title() 
                    : 'Datskiv dental clinic ' . get_the_title();
                ?>
                <img src="<?php echo esc_url($image['url']); ?>"  title="<?php echo $image_title_alt; ?>" alt="<?php echo $image_title_alt; ?>" />
              </div>
            <?php endforeach; ?>
            <?php foreach ($second_images_row as $image) : ?>
              <div class="image">
                <?php
                  $image_title_alt = (defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE === 'sk') 
                    ? 'Datskiv zubná klinika ' . get_the_title() 
                    : 'Datskiv dental clinic ' . get_the_title();
                ?>
                <img src="<?php echo esc_url($image['url']); ?>"  title="<?php echo $image_title_alt; ?>" alt="<?php echo $image_title_alt; ?>" />
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <div class="container-custom">
    <div class="banner-with-text-wrap">
      <?php if (!empty($one_image)) : ?>
        <div class="main-img">
          <?php
            $image_title_alt = (defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE === 'sk') 
              ? 'Datskiv zubná klinika ' . get_the_title() 
              : 'Datskiv dental clinic ' . get_the_title();
          ?>
          <img src="<?php echo esc_url($one_image['url']); ?>"  title="<?php echo $image_title_alt; ?>" alt="<?php echo $image_title_alt; ?>" />
        </div>
      <?php endif; ?>
      <?php if (!empty($sub_title)): ?><h2 class="sub-title"><?php echo $sub_title; ?></h2><?php endif; ?>
      <?php if (!empty($content)): ?><div class="content"><?php echo $content; ?></div><?php endif; ?>
      <div class="buttons-wrap">
        <?php if (!empty($buttons)): ?>
          <?php foreach ($buttons as $button): ?>
        <?php if (!empty($button['button'])): ?>
          <a href="<?php echo esc_url($button['button']['url']); ?>" class="button">
            <?php echo esc_html($button['button']['title']); ?>
          </a>
        <?php endif; ?>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>

</section>