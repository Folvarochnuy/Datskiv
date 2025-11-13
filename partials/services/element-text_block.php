<?php 

  $text = get_sub_field('text');
  $container_width = get_sub_field('container_width');
  $form_direction = get_sub_field('form_direction');
  $text_color = get_sub_field('text_color');
  $bg_color = get_sub_field('bg_color');
  $visability = get_sub_field('visability');

?>

<section class="container-wrap text-block<?php if ($visability == 'hidden') { echo ' hidden'; }?><?php if ($bg_color == 'violet') { echo ' violet-bg'; }?>">

  <div class="container-custom">
    <div class="text-block-wrap<?php if ($container_width == 'medium') { echo ' medium'; } elseif ($container_width == 'small') { echo ' small'; } ?><?php if ($form_direction == 'horizontal') { echo ' form-horizontal'; }?><?php if ($text_color == 'violet') { echo ' text-violet'; }?>">
      <?php if (!empty($text)): ?><?php echo $text; ?><?php endif; ?>
    </div>
  </div>

</section>