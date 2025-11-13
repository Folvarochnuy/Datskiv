<?php 

  $title = get_sub_field('title');
  $sub_title = get_sub_field('sub_title');
  $content = get_sub_field( 'content');
  $services = get_sub_field( 'services');
  $visability = get_sub_field('visability');

?>

<section class="container-wrap services<?php if ($visability == 'hidden') { echo ' hidden'; }?>">

  <div class="container-custom">
    <div class="services-block-wrap">
      <?php if (!empty($title)): ?><h3 class="title"><?php echo $title; ?></h3><?php endif; ?>
      <?php if (!empty($sub_title)): ?><h2 class="sub-title"><?php echo $sub_title; ?></h2><?php endif; ?>
      <?php if (!empty($content)): ?><div class="content"><?php echo $content; ?></div><?php endif; ?>
      <div class="services-wrap">
        <?php
        if ($services && is_array($services)):
          foreach ($services as $service):
            // Get relationship field (array of post objects)
            $related_services = $service['service'];
            $image = $service['image'];
            $description = $service['description'];
            ?>
            <div class="service-item">
              <div class="left">
                <?php if (!empty($image)): ?>
                  <div class="service-image">
                    <img src="<?php echo function_exists('esc_url') ? esc_url($image['url']) : $image['url']; ?>" alt="<?php if (!empty($related_services) && is_array($related_services)) { echo esc_attr(get_the_title($related_services[0]->ID)); } ?>">
                  </div>
                <?php endif; ?>
                <?php if (!empty($related_services) && is_array($related_services)): ?>
                  <a href="<?php echo function_exists('esc_url') ? esc_url(get_permalink($related_services[0]->ID)) : get_permalink($related_services[0]->ID); ?>" title="<?php { echo esc_attr(get_the_title($related_services[0]->ID)); } ?>"></a>
                <?php endif; ?>
              </div>
              <div class="right">
                <div class="title">
                  <?php
                    if (!empty($related_services) && is_array($related_services)):
                      foreach ($related_services as $related):
                        ?>
                          <a href="<?php echo esc_url(get_permalink($related->ID)); ?>"><?php echo esc_html(get_the_title($related->ID)); ?></a>
                        <?php
                      endforeach;
                    endif;
                  ?>
                </div>
                <?php if (!empty($description)): ?>
                  <div class="service-description">
                    <?php echo esc_html($description); ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
            <?php
          endforeach;
        endif;
        ?>
      </div>
    </div>
  </div>

</section>