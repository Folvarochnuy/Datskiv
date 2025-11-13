<?php

  $gallery = get_sub_field('gallery');
  $visability = get_sub_field('visability');

?>

<section class="container-wrap gallery<?php if ($visability == 'hidden') { echo ' hidden'; }?>">

  <div class="container-custom">
    <div class="gallery-wrap">
      <?php if ($gallery) : ?>
        <div class="swiper post-gallery-swiper">
          <div class="swiper-wrapper">
            <?php foreach ($gallery as $image) : ?>
              <div class="swiper-slide">
                <?php
                  $image_title_alt = (defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE === 'sk') 
                    ? 'Datskiv zubná klinika ' . get_the_title() 
                    : 'Datskiv dental clinic ' . get_the_title();
                ?>
                <img loading="lazy" src="<?php echo esc_url($image['url']); ?>"  title="<?php echo $image_title_alt; ?>" alt="<?php echo $image_title_alt; ?>" />
              </div>
            <?php endforeach; ?>
          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      <?php endif; ?>
    </div>
  </div>

</section>