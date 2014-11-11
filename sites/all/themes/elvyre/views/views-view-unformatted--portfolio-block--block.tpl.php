<?php
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>


<div class='row'> 
   <article class="grid_12">
       <article class="portfolio-carousel triggerAnimation animated" data-animate="fadeInUp">
          <ul id="portfolio-carousel" class="carousel-li">

<?php foreach ($rows as $id => $row): ?>
  
    <?php print $row; ?>

<?php endforeach; ?>
         </ul>
<div class="clearfix"></div>
      <ul class="carousel-nav">
         <li>
            <a class="c_prev_2" href="#"></a> 
         </li>
         <li>
           <a class="c_next_2" href="#"></a>
         </li>
       </ul>
       </article><!-- .portfolio-carousel end -->
   </article><!-- .grid_12 end -->
</div><!-- .row end -->