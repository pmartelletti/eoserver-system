<div class="row portfolio-filters triggerAnimation animated" data-animate="fadeInDown">
  <section class="grid_12">
    <ul id="filters">
    <li><a href="#" data-filter="*" class="active"><?php print t("All"); ?></a></li>
    <?php foreach ($rows as $id => $row): ?>
      <li <?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
        <?php print $row; ?>
      </li>
    <?php endforeach; ?>
     </ul>
   </section><!-- .grid_12 end -->                    
</div><!-- .row.portfolio-filters end  end -->