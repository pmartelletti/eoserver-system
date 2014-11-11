<?php if (!empty($title)) : ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>

                <!-- .row.portfolio-items-holder start -->
                <div class="row portfolio-items-holder triggerAnimation animated" data-animate="fadeInUp">

                    <!-- #portfolioitems.isotope start -->
                    <ul id="portfolioitems" class="isotope">
  <?php foreach ($rows as $row_number => $columns): ?>        
    <?php foreach ($columns as $column_number => $item): ?>
      <?php print $item; ?>
    <?php endforeach; ?>
  <?php endforeach; ?>
  </ul>
</div>