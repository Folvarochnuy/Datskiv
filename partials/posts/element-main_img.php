<?php 

  $image = get_sub_field('image');
  $visability = get_sub_field('visability');

?>

<section class="container-wrap main-img<?php if ($visability == 'hidden') { echo ' hidden'; }?>">

  <div class="container-custom">
    <div class="main-img-wrap">
      <?php
      $image_title_alt = (defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE === 'sk') 
        ? 'Datskiv zubná klinika ' . get_the_title() 
        : 'Datskiv dental clinic ' . get_the_title();
      ?>
      <img src="<?php echo esc_url($image['url']); ?>"  title="<?php echo $image_title_alt; ?>" alt="<?php echo $image_title_alt; ?>" />
    </div>
  </div>

</section>