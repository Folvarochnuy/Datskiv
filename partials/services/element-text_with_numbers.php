<?php

  $title = get_sub_field('title');
  $sub_title = get_sub_field('sub_title');
  $content = get_sub_field('content');
  $numbers = get_sub_field('numbers');
  $visability = get_sub_field('visability');

?>

<section class="container-wrap text-with-numbers<?php if ($visability == 'hidden') { echo ' hidden'; }?>">

  <div class="container-custom">
    <div class="text-with-numbers-wrap">
      <?php if (!empty($title)): ?><h3 class="title"><?php echo $title; ?></h3><?php endif; ?>
      <?php if (!empty($sub_title)): ?><h2 class="sub-title"><?php echo $sub_title; ?></h2><?php endif; ?>
      <?php if (!empty($content)): ?><div class="content"><?php echo $content; ?></div><?php endif; ?>
      <div class="numbers-wrap">
        <?php
        if (!empty($numbers)):
          $index = 1;
          foreach ($numbers as $number):
            $number_title = $number['number_title'];
            $number_text = $number['number_text'];
            $display_number = $index < 10 ? '0' . $index : $index;
            ?>
            <div class="number-item">
              <div class="content-wrap">
                <p class="number"><?php echo esc_html($display_number); ?></p>
                <div class="text-wrap">
                  <p class="title"><?php echo esc_html($number_title); ?></p>
                  <div class="text"><?php echo $number_text; ?></div>
                </div>
              </div>
            </div>
              <?php
            $index++;
          endforeach;
        endif;
        ?>
    </div>
  </div>

</section>