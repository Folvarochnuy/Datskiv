<?php 
  
  $map = get_sub_field('map');
  $address_title = get_sub_field('address_title');
  $address_link = get_sub_field('address_link');
  $address_apple_link = get_sub_field('address_apple_link');
  $hours_title = get_sub_field('hours_title');
  $hours_days = get_sub_field('hours_days');
  $hours_time = get_sub_field('hours_time');
  $hours_text = get_sub_field('hours_text');
  $contact_title = get_sub_field('contact_title');
  $contact_info = get_sub_field('contact_info');
  $visability = get_sub_field('visability');

?>

<section class="container-wrap map<?php if ($visability == 'hidden') { echo ' hidden'; }?>">

  <div class="container-custom">
    <div class="map-wrap">
      <div class="left">
        <?php if (!empty($map)): ?><?php echo $map; ?><?php endif; ?>
      </div>
      <div class="right">
        <div class="address-wrap info">
          <?php if (!empty($address_title)): ?><h4 class="title"><?php echo $address_title; ?></h4><?php endif; ?>
          <?php if (!empty($address_link)): ?><a target="_blank" href="<?php echo esc_url($address_link['url']); ?>"><?php echo esc_html($address_link['title']); ?></a><?php endif; ?>
          <div class="maps-links-wrap">
            <?php if (!empty($address_link)): ?><a class="google-maps" target="_blank" href="<?php echo esc_url($address_link['url']); ?>">Google Maps</a><?php endif; ?>
            <?php if (!empty($address_apple_link)): ?><a target="_blank" href="<?php echo esc_url($address_apple_link['url']); ?>"><?php echo esc_html($address_apple_link['title']); ?></a><?php endif; ?>
          </div>
        </div>
        <div class="hours-wrap info">
          <?php if (!empty($hours_title)): ?><h4 class="title"><?php echo $hours_title; ?></h4><?php endif; ?>
         <div class="hours-info">
          <?php if (!empty($hours_days)): ?><p class="hours-days"><?php echo $hours_days; ?></p><?php endif; ?>
          <?php if (!empty($hours_time)): ?><p class="hours-time"><?php echo $hours_time; ?></p><?php endif; ?>
         </div>   
          <?php if (!empty($hours_text)): ?><p class="hours-text"><?php echo $hours_text; ?></p><?php endif; ?>
        </div>
        <div class="contact-wrap info">
          <?php if (!empty($contact_title)): ?><h4 class="title"><?php echo $contact_title; ?></h4><?php endif; ?>
          <?php if (!empty($contact_info)): ?><div class="contact-info"><?php echo $contact_info; ?></div><?php endif; ?>
        </div>
      </div>
    </div>
  </div>

</section>