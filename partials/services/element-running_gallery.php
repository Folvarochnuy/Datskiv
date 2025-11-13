<?php 

  $title = get_sub_field('title');
  $images = get_sub_field('images');
  $visability = get_sub_field('visability');

?>

<section class="container-wrap running-gallery<?php if ($visability == 'hidden') { echo ' hidden'; }?>">

  <div class="running-gallery-wrap">
    <div class="container-custom">
      <?php if (!empty($title)): ?><h3 class="title"><?php echo $title; ?></h3><?php endif; ?>
    </div>
    <div class="gallery-wrap">
      <div class="running-gallery-animation">
        <?php if (!empty($images)) : ?>
          <?php foreach ($images as $image) : ?>
            <div class="image">
              <?php
                $image_title_alt = (ICL_LANGUAGE_CODE === 'sk') ? 'Datskiv zubná klinika' : 'Datskiv dental clinic';
              ?>
              <img src="<?php echo esc_url($image['url']); ?>"  title="<?php echo $image_title_alt; ?>" alt="<?php echo $image_title_alt; ?>" />
            </div>
          <?php endforeach; ?>
          <?php foreach ($images as $image) : ?>
            <div class="image">
              <?php
                $image_title_alt = (ICL_LANGUAGE_CODE === 'sk') ? 'Datskiv zubná klinika' : 'Datskiv dental clinic';
              ?>
              <img src="<?php echo esc_url($image['url']); ?>"  title="<?php echo $image_title_alt; ?>" alt="<?php echo $image_title_alt; ?>" />
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>

</section>