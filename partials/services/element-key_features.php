<?php 

  $title = get_sub_field('title');
  $sub_title = get_sub_field('sub_title');
  $features = get_sub_field( 'features');
  $heading_h1 = get_sub_field('heading_h1');
  $columns_count = get_sub_field('columns_count');
  $visability = get_sub_field('visability');

?>

<section class="container-wrap key-features<?php if ($visability == 'hidden') { echo ' hidden'; }?>">

  <div class="container-custom">
    <div class="key-features-wrap">
      <?php if (!empty($title)): ?><h3 class="title"><?php echo $title; ?></h3><?php endif; ?>
      <?php if (!empty($sub_title)): ?>
        <?php if ($heading_h1 == 'yes'): ?>
          <h1 class="sub-title"><?php echo $sub_title; ?></h1>
        <?php else: ?>
          <h2 class="sub-title"><?php echo $sub_title; ?></h2>
        <?php endif; ?>
      <?php endif; ?>
      <div class="features-wrap<?php if ($columns_count == 'two') { echo ' two-columns'; }?>">
        <?php
        if (!empty($features)):
          foreach ($features as $feature):
            $feature_title = $feature['feature_title'];
            $feature_text = $feature['feature_text'];
            $show_point = $feature['show_point'];
            ?>
            <div class="feature-item<?php if ($show_point == 'no') { echo ' without-point'; }?>">
              <p class="title"><?php echo esc_html($feature_title); ?></p>
              <div class="text"><?php echo $feature_text; ?></div>
            </div>
          <?php
          endforeach;
        endif;
        ?>
      </div>
    </div>
  </div>

</section>