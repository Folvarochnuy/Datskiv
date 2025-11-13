<?php 

  $title = get_sub_field('title');
  $sub_title = get_sub_field('sub_title');
  $content = get_sub_field( 'content');
  $faqs = get_sub_field('faqs');
  $section_link = get_sub_field('section_link');
  $heading_h1 = get_sub_field('heading_h1');
  $visability = get_sub_field('visability');

?>

<section class="container-wrap faq<?php if ($visability == 'hidden') { echo ' hidden'; }?>">

  <div class="container-custom">
    <div class="faq-wrap">
      <?php if (!empty($title)): ?><h3 class="title"><?php echo $title; ?></h3><?php endif; ?>
      <?php if (!empty($sub_title)): ?>
        <?php if ($heading_h1 == 'yes'): ?>
          <h1 class="sub-title"><?php echo $sub_title; ?></h1>
        <?php else: ?>
          <h2 class="sub-title"><?php echo $sub_title; ?></h2>
        <?php endif; ?>
      <?php endif; ?>
      <?php if (!empty($content)): ?><div class="content"><?php echo $content; ?></div><?php endif; ?>
      <dl class="faqs-wrap">
        <?php
        if ($faqs && is_array($faqs)):
          $i = 0;
          foreach ($faqs as $faq):
            $question = $faq['question'];
            $answer = $faq['answer'];
            $active_class = ($i === 0) ? ' active' : '';
            ?>
            <div class="faq-item">
              <dt class="question<?php echo $active_class; ?>">
                <?php if (!empty($question)): ?><?php echo $question; ?><?php endif; ?>
              </dt>
              <dd class="answer"><?php if (!empty($answer)): ?><?php echo $answer; ?><?php endif; ?></dd>
            </div>
          <?php
            $i++;
          endforeach;
        endif;
        ?>
      </dl>
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

<?php
if ($faqs && is_array($faqs)):
  ?>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      <?php
      $faq_items = [];
      foreach ($faqs as $faq):
        $question = esc_html($faq['question']);
        $answer = wp_kses_post($faq['answer']);
        $faq_items[] = sprintf(
          '{
            "@type": "Question",
            "name": "%s",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "%s"
            }
          }',
          $question,
          str_replace(array("\r", "\n"), "", $answer)
        );
      endforeach;
      echo implode(',', $faq_items);
      ?>
    ]
  }
  </script>
  <?php
endif;
?>