<?php 

  $title = get_sub_field('title');
  $sub_title = get_sub_field('sub_title');
  $numbers = get_sub_field('numbers');
  $link_pretext = get_sub_field('link_pretext');
  $section_link = get_sub_field('section_link');
  $visability = get_sub_field('visability');

?>

<section class="container-wrap numbers<?php if ($visability == 'hidden') { echo ' hidden'; }?>">

  <div class="container-custom">
    <div class="numbers-wrap">
      <?php if (!empty($title)): ?><h3 class="title"><?php echo $title; ?></h3><?php endif; ?>
      <?php if (!empty($sub_title)): ?><h2 class="sub-title"><?php echo $sub_title; ?></h2><?php endif; ?>
      <div class="count">
        <?php if (!empty($numbers)): ?>
          <?php 
            foreach ($numbers as $number) : 
              $count = $number['count'];
              $count_title = $number['count_title'];
              $count_sub_title = $number['count_sub_title'];
          ?>
            <div class="count-wrap">
              <?php if (!empty($count)) : ?>
                <span class="count-number">
                  <?php echo $count; ?>
                </span>
              <?php endif; ?>
              <?php if (!empty($count_title)) : ?>
                <p class="count-title">
                  <?php echo $count_title; ?>
                </p>
              <?php endif; ?>
              <?php if (!empty($count_sub_title)) : ?>
                <span class="count-sub-title">
                  <?php echo $count_sub_title; ?>
                </span>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
      <div class="bottom-link">
        <p>
          <?php if (!empty($link_pretext)): ?>
            <span><?php echo $link_pretext; ?></span>
          <?php endif; ?>
          <?php if (!empty($section_link)): ?>
            <a href="<?php echo esc_url($section_link['url']); ?>">
              <?php echo esc_html($section_link['title']); ?>
            </a>
          <?php endif; ?>
        </p>
      </div>
    </div>
  </div>

</section>