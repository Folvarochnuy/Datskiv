<?php 

  $title = get_sub_field('title');
  $sub_title = get_sub_field('sub_title');
  $content = get_sub_field('content');
  $testimonials = get_sub_field('testimonials');
  $form = get_sub_field('form');
  $visability = get_sub_field('visability');

?>

<section class="container-wrap testimonials<?php if ($visability == 'hidden') { echo ' hidden'; }?>">

  <div class="container-custom">
    <div class="testimonials-wrap">
      <?php if (!empty($title)): ?><h3 class="title"><?php echo $title; ?></h3><?php endif; ?>
      <?php if (!empty($sub_title)): ?><h2 class="sub-title"><?php echo $sub_title; ?></h2><?php endif; ?>
      <?php if (!empty($content)): ?><div class="content"><?php echo $content; ?></div><?php endif; ?>
      <div class="swiper testimonials-swiper">
        <div class="swiper-wrapper">
          <?php if (!empty($testimonials)): ?>
            <?php 
              foreach ($testimonials as $testimonial) : 
                $stars = $testimonial['stars'];
                $image = $testimonial['image'];
                $name = $testimonial['name'];
                $service = $testimonial['service'];
                $coment = $testimonial['coment'];
            ?>
              <div class="swiper-slide">
                <blockquote class="testimonial-wrap">
                  <div class="stars">
                    <?php
                      if (!empty($stars) && is_numeric($stars)) {
                      for ($i = 0; $i < intval($stars); $i++) {
                        echo '<span class="star"></span>';
                      }
                      }
                    ?>
                  </div>
                  <div class="image-wrap">
                    <div class="left">
                      <img loading="lazy" src="<?php echo esc_url($image['url']) ?: '/wp-content/uploads/2025/05/Vector.png'; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" />
                    </div>
                    <div class="right">
                      <?php if (!empty($name)): ?><cite class="name"><?php echo $name; ?></cite><?php endif; ?>
                      <?php if (!empty($service)): ?><span class="service"><?php echo $service; ?></span><?php endif; ?>
                    </div>
                  </div>
                  <?php if (!empty($coment)): ?><p class="coment"><?php echo $coment; ?></p><?php endif; ?>
                </blockquote>
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
      <?php if (!empty($form)): ?><div class="form-wrap"><?php echo $form; ?></div><?php endif; ?>
    </div>
  </div>

</section>