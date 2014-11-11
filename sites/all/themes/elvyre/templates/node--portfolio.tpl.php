<?php 
if (!$page) { 
?>

<?php
$image_slide = "";

if ($items = field_get_items('node', $node, 'field_portfolio_slider')) {
  if (count($items) == 1) {
    $image_slide = 'false';
  }
  elseif (count($items) > 1) {
    $image_slide = 'true';
  }
}

$img_count = 0;
$counter = count($items);

?>

<div class="row">
<?php if ( ($image_slide == 'true') ): ?>
 <!-- .grid_7 start -->
            <article class="grid_7 alpha triggerAnimation animated" data-animate="fadeInLeft">
                <section id="post-slider" class="nivoSlider">
                <?php while ($img_count < $counter) { ?>
                  <img src="<?php echo file_create_url($node->field_portfolio_slider['und'][$img_count]['uri']); ?>" alt="img" >
                  <?php $img_count++; } ?>	
                </section><!-- .nivoSlider end -->
            </article><!-- .grid_7 end -->
<?php endif; ?>
 
<?php if ($image_slide == 'false'): ?>
            <article class="grid_7 alpha triggerAnimation animated" data-animate="fadeInLeft">
			<img src="<?php echo file_create_url($node->field_portfolio_slider['und'][0]['uri']); ?>" alt="img" >
            </article><!-- .grid_7 end -->
<?php endif; ?>


                    <!-- .grid_5 start -->
                    <article class="grid_5 omega triggerAnimation animated" data-animate="fadeInRight">
                        <!-- .heading-bordered start -->
                        <section class="heading-bordered">
                            <h3><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h3>
                        </section><!-- .heading-bordered end -->
<?php
  hide($content['field_portfolio_slider']);
  hide($content['field_portfolio_image']);
  hide($content['links']);
  hide($content['field_portfolio_tags']);
  hide($content['field_portfolio_link']);
  hide($content['field_body']);
?>
                        <div class="portfolio-single-like clearfix">
                        <br /><br />
                         <?php print render($content['field_portfolio_tags']); ?>
                          
                        </div>

                        <br /><br />
                         <?php print render($content['field_portfolio_link']); ?>
        
                    </article><!-- .grid_5 end -->
                </div><!-- .row end -->


<?php } else { 

$acc = user_load(1);
?>

<?php
$image_slide = "";

if ($items = field_get_items('node', $node, 'field_portfolio_slider')) {
  if (count($items) == 1) {
    $image_slide = 'false';
  }
  elseif (count($items) > 1) {
    $image_slide = 'true';
  }
}

$img_count = 0;
$counter = count($items);

?>

<div class="row">
<?php if ( ($image_slide == 'true') ): ?>
 <!-- .grid_7 start -->
            <article class="grid_7 alpha triggerAnimation animated" data-animate="fadeInLeft">
                <section id="post-slider" class="nivoSlider">
                <?php while ($img_count < $counter) { ?>
                  <img src="<?php echo file_create_url($node->field_portfolio_slider['und'][$img_count]['uri']); ?>" alt="img" >
                  <?php $img_count++; } ?>	
                </section><!-- .nivoSlider end -->
            </article><!-- .grid_7 end -->
<?php endif; ?>
 
<?php if ($image_slide == 'false'): ?>
            <article class="grid_7 alpha triggerAnimation animated" data-animate="fadeInLeft">
			<img src="<?php echo file_create_url($node->field_portfolio_slider['und'][0]['uri']); ?>" alt="img" >
            </article><!-- .grid_7 end -->
<?php endif; ?>


                    <!-- .grid_5 start -->
                    <article class="grid_5 omega triggerAnimation animated" data-animate="fadeInRight">
                        <!-- .heading-bordered start -->
                        <section class="heading-bordered">
                            <h3><?php print $title; ?></h3>
                        </section><!-- .heading-bordered end -->
<?php
  hide($content['field_portfolio_slider']);
  hide($content['field_portfolio_image']);
  hide($content['links']);
  hide($content['field_portfolio_tags']);
  hide($content['field_portfolio_link']);
  print render($content);
?>
                        <div class="portfolio-single-like clearfix">
                        <br /><br />
                         <?php print render($content['field_portfolio_tags']); ?>
                          
                        </div>

                        <br /><br />
                         <?php print render($content['field_portfolio_link']); ?>
        
                    </article><!-- .grid_5 end -->
                </div><!-- .row end -->


<?php } ?>