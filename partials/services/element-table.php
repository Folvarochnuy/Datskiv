<?php 

  $title = get_sub_field('title');
  $columns = get_sub_field('columns');
  $visability = get_sub_field('visability');

?>

<section class="container-wrap table<?php if ($visability == 'hidden') { echo ' hidden'; }?>">

  <div class="container-custom">
    <?php if (!empty($title)): ?><h3 class="title"><?php echo $title; ?></h3><?php endif; ?>
    <?php if (!empty($columns)): ?>
      <div class="columns-wrap">
        <div class="column-wrap-content">
          <?php foreach ($columns as $column) :
            $column_title = $column['column_title'];
            $rows = $column['rows'];
          ?>
          <div class="column">
            <div class="column-title">
              <?php if (!empty($column_title)): ?><?php echo $column_title; ?><?php endif; ?>
            </div>
            <?php if (!empty($rows)): 
              $i = 1;
            ?>
              <div class="column-content">
                <?php foreach ($rows as $row) :
                  $text = $row['text'];
                ?>
                <div class="column-content-item" data-count="<?php echo $i; ?>">
                  <?php if (!empty($text)): ?><?php echo $text; ?><?php endif; ?>
                </div>
                <?php 
                  $i++;
                  endforeach; 
                ?>
              </div>
            <?php endif; ?>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>

</section>