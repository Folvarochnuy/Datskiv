<?php 

  $title = get_sub_field('title');
  $content = get_sub_field( 'content');
  $button = get_sub_field('button');
  $images_first_column = get_sub_field('images_first_column');
  $images_second_column = get_sub_field('images_second_column');
  $visability = get_sub_field('visability');

?>

<section class="container-wrap text-and-images<?php if ($visability == 'hidden') { echo ' hidden'; }?>">

  <div class="container-custom">
    <div class="text-image-wrap">
      <div class="text">
        <?php if (!empty($title)): ?><h1 class="title"><?php echo $title; ?></h1><?php endif; ?>
        <?php if (!empty($content)): ?><div class="content"><?php echo $content; ?></div><?php endif; ?>
        <?php if (!empty($button)): ?>
          <a class="button" href="<?php echo esc_url($button['url']); ?>">
            <?php echo esc_html($button['title']); ?>
          </a>
        <?php endif; ?>
      </div>
      <div class="images">
        <div class="images-column">
          <?php
          if ($images_first_column && is_array($images_first_column)):
            foreach ($images_first_column as $image):
              $image_url = $image['url'];
              ?>
              <div class="image-item">
                <?php
                  $image_title_alt = (defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE === 'sk') 
                    ? 'Datskiv zubná klinika ' . get_the_title() 
                    : 'Datskiv dental clinic ' . get_the_title();
                ?>
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo $image_title_alt; ?>">
              </div>
            <?php
            endforeach;
          endif;
          ?>
        </div>
        <div class="images-column">
          <?php
          if ($images_second_column && is_array($images_second_column)):
            foreach ($images_second_column as $image):
              $image_url = $image['url'];
              ?>
              <div class="image-item">
                <?php
                  $image_title_alt = (defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE === 'sk') 
                    ? 'Datskiv zubná klinika ' . get_the_title() 
                    : 'Datskiv dental clinic ' . get_the_title();
                ?>
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo $image_title_alt; ?>">
              </div>
            <?php
            endforeach;
          endif;
          ?>
        </div>
      </div>
    </div>
  </div>

</section>