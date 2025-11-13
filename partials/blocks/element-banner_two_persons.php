<?php 
  
  $left_person = get_sub_field('left_person');
  $mobile_left_person = get_sub_field('mobile_left_person');
  $right_person = get_sub_field('right_person');
  $mobile_right_person = get_sub_field('mobile_right_person');
  $heading = get_sub_field('heading');
  $content = get_sub_field('content');
  $buttons = get_sub_field('buttons');
  $visability = get_sub_field('visability');

?>

<section class="container-wrap banner-two-persons<?php if ($visability == 'hidden') { echo ' hidden'; }?>">

    <div class="images-wrap">
      <div class="left-person">
        <?php
          $left_person_title_alt = (ICL_LANGUAGE_CODE === 'sk') ? 'Dr Hanna Kuznietsova' : 'Dr Hanna Kuznietsova';
        ?>
        <picture>
          <source media="(max-width: 480px)" srcset="<?php echo esc_url($mobile_left_person['url']); ?>">
            <img src="<?php echo esc_url($left_person['url']); ?>" alt="<?php echo $left_person_title_alt; ?>" title="<?php echo $left_person_title_alt; ?>" height="582px" width="564px">
        </picture>
      </div>
      <div class="right-person">
        <?php
          $right_person_title_alt = (ICL_LANGUAGE_CODE === 'sk') ? 'Dr Stanislav Datskiv' : 'Dr Stanislav Datskiv';
        ?>
        <picture>
          <source media="(max-width: 480px)" srcset="<?php echo esc_url($mobile_right_person['url']); ?>">
          <img src="<?php echo esc_url($right_person['url']); ?>" alt="<?php echo $right_person_title_alt; ?>" title="<?php echo $right_person_title_alt; ?>" fetchpriority="high" data-lazy-src="https://datskiv.sk/wp-content/uploads/2025/05/20250427-IMG_7021-min.png" data-ll-status="loaded" class="entered lazyloaded">
        </picture>
      </div>
    </div>
    <div class="content-wrap">
      <div class="container-custom">
        <div class="container-custom-wrap">
          <div class="heading">
            <?php
              $heading_title_alt = (ICL_LANGUAGE_CODE === 'sk') ? 'Zložité problémy so zubami vyriešime odborne a natrvalo.' : 'We will solve complex dental problems professionally and permanently.';
            ?>
            <h1>
              <?php
                echo (defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE === 'sk') ? 'Zložité problémy so zubami vyriešime odborne a natrvalo.' : 'We will solve complex dental problems professionally and permanently.';
              ?>
            </h1>
            <img src="<?php echo esc_url($heading['url']); ?>" title="<?php echo $heading_title_alt; ?>" alt="<?php echo $heading_title_alt; ?>" />
          </div>
          <?php if (!empty($content)): ?><div class="content"><?php echo $content; ?></div><?php endif; ?>
          <div class="buttons-wrap">
            <?php if (!empty($buttons)): ?>
              <?php foreach ($buttons as $button): ?>
            <?php if (!empty($button['button'])): ?>
              <a href="<?php echo esc_url($button['button']['url']); ?>" class="button">
                <?php echo esc_html($button['button']['title']); ?>
              </a>
            <?php endif; ?>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

</section>