<?php 

  $title = get_sub_field('title');
  $sub_title = get_sub_field('sub_title');
  $content = get_sub_field( 'content');
  $faqs = get_sub_field('faqs');
  $section_link = get_sub_field('section_link');
  $visability = get_sub_field('visability');

?>

<section class="container-wrap faq<?php if ($visability == 'hidden') { echo ' hidden'; }?>">

  <div class="container-custom">
    <div class="faq-wrap">
      <?php if (!empty($title)): ?><h3 class="title"><?php echo $title; ?></h3><?php endif; ?>
      <?php if (!empty($sub_title)): ?><h2 class="sub-title"><?php echo $sub_title; ?></h2><?php endif; ?>
      <?php if (!empty($content)): ?><div class="content"><?php echo $content; ?></div><?php endif; ?>
      <div class="faqs-wrap">
        <?php
        if ($faqs && is_array($faqs)):
          $i = 0;
          foreach ($faqs as $faq):
            $question = $faq['question'];
            $answer = $faq['answer'];
            $active_class = ($i === 0) ? ' active' : '';
            ?>
            <div class="faq-item">
              <p class="question<?php echo $active_class; ?>">
                <?php if (!empty($question)): ?><?php echo $question; ?><?php endif; ?>
              </p>
              <div class="answer"><?php if (!empty($answer)): ?><?php echo $answer; ?><?php endif; ?></div>
            </div>
          <?php
            $i++;
          endforeach;
        endif;
        ?>
      </div>
    </div>
    <div class="section-link">
      <?php if (!empty($section_link)): ?>
        <a href="<?php echo esc_url($section_link['url']); ?>">
          <?php echo esc_html($section_link['title']); ?>
        </a>
      <?php endif; ?>
    </div>
  </div>

</section>