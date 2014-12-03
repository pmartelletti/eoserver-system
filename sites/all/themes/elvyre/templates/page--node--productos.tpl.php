<!-- .header-wrapper start -->
<script src="/misc/jquery.elevatezoom.js" type="text/javascript"></script>

<div id="header-wrapper" class="clearfix">
    <!-- .top-bar start -->
    <section id="top-bar-wrapper">
        <div id="top-bar" class="clearfix">
            <!-- .container start -->
            <div class="container">
                <!-- .row start -->
                <div class="row">
                    <section class="grid_6">
                        <?php if ($page['top_left']): ?><?php print render($page['top_left']); ?><?php endif; ?>
                    </section>  
                    <section class="grid_6"> 
                        <?php if ($page['top_right']): ?><?php print render($page['top_right']); ?><?php endif; ?>
                    </section> 
                </div><!-- .container end -->
            </div><!-- .row end -->
        </div><!-- .top-bar end -->
    </section><!-- .top-bar-wrapper end -->

    <!-- #header start -->
    <header id="header" class="clearfix">
        <?php if ($logo): ?>
            <section id="logo">
                <a href="<?php print $front_page; ?>"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
            </section>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
            <div id="tagline" class="font_heading">
                <?php print $site_slogan; ?>
            </div>
        <?php endif; ?>
        <section id="nav-container">
            <nav id="nav">
                <?php print render($page['main_menu']); ?>
            </nav><!-- #nav end -->                  
        </section><!-- #nav-container end -->


        <!--  // <?php
        $block = module_invoke('search', 'block_view', 'search');
        print render($block);
        ?> //  -->   


    </header><!-- .header end -->        
</div><!-- .header-wrapper end -->
<?php if (!drupal_is_front_page()): ?>
    <!-- #page-title start -->
    <section id="page-title" class="page-title-1" data-stellar-background-ratio="0.5">

        <?php if ($image_fondo): ?>
            <div style="background: url(<?php print $image_fondo ?>) repeat scroll 0% 0% / 100%  transparent; min-height: 530px;margin-top: -12px;"></div>
        <?php else: ?>
            <div style="background: transparent; min-height: 530px;margin-top: -12px;"></div>
        <?php endif; ?>
        <div class="grisado"></div>
        <div class="n50"></div>
    </section><!-- #page-title end -->
<?php endif; ?>



<!-- .tp-wrapper start -->
<div class="tp-wrapper">
    <!-- .tp-banner-container start -->
    <div class="tp-banner-container">
        <div class="tp-banner">
            <?php if ($page['slider']): ?><?php print render($page['slider']); ?><?php endif; ?>
        </div><!-- .tp-banner end -->
    </div><!-- .tp-banner end -->
</div><!-- .tp-wrapper end -->



<?php if ($page['featured']): ?>
    <!-- .page-content start -->
    <section class="page-content background-black">
        <!-- .container start -->
        <div class="container">
            <!-- .row start -->
            <div class="row">
                <article class="grid_12">
                    <div class="triggerAnimation animated" data-animate="fadeInUp">
                        <div class="note no-bottom-margin">
                            <?php print render($page['featured']); ?>
                        </div>
                    </div><!-- .triggerAnimation.animated end -->
                </article><!-- .grid_12 end -->
            </div><!-- .row end -->
        </div><!-- .container end -->
    </section><!-- .page-content end -->
<?php endif; ?> 




<?php if ($page['content_parallax_1']): ?>
    <!-- .page-content start -->
    <section class="page-content parallax parallax-1" data-stellar-background-ratio="0.5">
        <!-- .container start -->
        <div class="container">
            <!-- .row start -->
            <div class="row">
                <article class="grid_12">
                    <?php print render($page['content_parallax_1']); ?>

                </article><!-- .grid_12 end -->                    
            </div><!-- .row end -->
        </div><!-- .container end -->
    </section><!-- .page-content end -->
<?php endif; ?> 
<section class='page-content'>
    <div class="container">
        <div class="row">

            <?php if (($page['sidebar_left'])) : ?>
                <aside class="grid_3 aside-left triggerAnimation animated" data-animate="fadeInLeft">
                    <?php print render($page['sidebar_left']); ?>
                </aside>
            <?php endif; ?>

            <?php if (($page['sidebar_right']) AND ( !$page['sidebar_left'])): ?>
                <article class="grid_9 triggerAnimation animated" data-animate="fadeInLeft">
                <?php endif; ?>
                <?php if ((!$page['sidebar_right']) AND ( $page['sidebar_left'])): ?>
                    <article class="grid_9 triggerAnimation animated" data-animate="fadeInRight">
                    <?php endif; ?>

                    <?php if (($page['sidebar_right']) AND ( $page['sidebar_left'])): ?>
                        <article class="grid_6 triggerAnimation animated" data-animate="fadeInLeft">
                        <?php endif; ?>
                        <?php if ((!$page['sidebar_right']) AND ( !$page['sidebar_left'])): ?>
                            <article class="article grid_12">
                            <?php endif; ?>

                            <?php if ($messages): ?>

                                <div id="messages">
                                    <?php print $messages; ?>
                                </div>

                            <?php endif; ?>
                            <?php if (false && $title): ?><h1 class="title" id="pt"><?php print $title; ?></h1><?php endif; ?>

                            <?php if ($tabs): ?><div class="d-tabs"><?php print render($tabs); ?></div><?php endif; ?>
                            <?php print render($page['help']); ?>
                            <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
                            <?php print render($page['content']); ?>
                            <?php
                            $block = module_invoke('custom_producto', 'block_view', 'detail_product');
                            print render($block);
                            ?>
                        </article><!-- .article end -->

                        <?php if (($page['sidebar_right'])) : ?>
                            <aside class="grid_3 aside-right triggerAnimation animated" data-animate="fadeInRight">
                                <?php print render($page['sidebar_right']); ?>
                            </aside>
                        <?php endif; ?>

                        </div><!-- .row end -->
                        </div><!-- .container end -->
                        </section><!-- .page-content end -->

                        <?php if ($page['content_parallax_2']): ?>

                            <!-- .page-content.parallax start -->
                            <section class="page-content parallax parallax-2">
                                <!-- .container start -->
                                <div class="container">

                                    <?php print render($page['content_parallax_2']); ?>

                                <?php endif; ?> 

                            </div><!-- .container end -->
                        </section><!-- .page-content.parallax.parallax-2 end -->

                        <section class="page-content">
                            <div class="container">
                                <?php if ($page['postscript_first']): ?>
                                    <!-- .row start -->
                                    <div class="row">
                                        <article class="grid_12">
                                            <section class="heading-centered triggerAnimation animated" data-animate="bounceIn">
                                                <?php print render($page['postscript_first']); ?>
                                            </section>
                                        </article><!-- .grid_12 end -->

                                    </div><!-- .row end -->
                                <?php endif; ?>

                            </div><!-- .container end -->
                        </section><!-- .page-content end -->

                        <?php if ($page['content_parallax_3']): ?>
                            <!-- .page-content.parallax start -->
                            <section class="page-content parallax parallax-3" data-stellar-background-ratio="0.5">
                                <!-- .container start -->
                                <div class="container">


                                    <?php print render($page['content_parallax_3']); ?>

                                <?php endif; ?> 

                            </div><!-- .container end -->
                        </section><!-- .page-content.parallax end -->

                        <section class="page-content">
                            <div class="container">
                                <?php if ($page['postscript_second']): ?>
                                    <!-- .row start -->
                                    <div class="row">
                                        <article class="grid_12">
                                            <section class="heading-centered triggerAnimation animated" data-animate="bounceIn">
                                                <?php print render($page['postscript_second']); ?>
                                            </section>
                                        </article><!-- .grid_12 end -->

                                    </div><!-- .row end -->
                                <?php endif; ?>

                            </div><!-- .container end -->
                        </section><!-- .page-content end -->


                        <?php if ($page['content_parallax_4']): ?>
                            <section class="page-content bottom1">
                                <div class="container">
                                    <div class="row">
                                        <?php print render($page['content_parallax_4']); ?>
                                    </div><!-- .row end -->
                                </div><!-- .container end -->
                            </section><!-- .page-content end -->
                        <?php endif; ?> 

                        </div><!-- .container end -->
                        </section><!-- .page-content.parallax end -->

                        <?php if ($page['postscript_third'] || $page['postscript_fourth']) : ?>
                            <section class="page-content">
                                <div class="container">
                                    <div class="row">
                                        <?php if ($page['postscript_third']): ?>

                                            <article class="grid_9">
                                                <div class="triggerAnimation animated" data-animate='fadeInLeft'>
                                                    <?php print render($page['postscript_third']); ?>
                                                </div><!-- .triggerAnimation.animated end -->
                                            </article>
                                        <?php endif; ?> 
                                        <?php if ($page['postscript_fourth']): ?>     
                                            <article class="grid_3">
                                                <div class="triggerAnimation animated" data-animate="fadeInRight">
                                                    <?php print render($page['postscript_fourth']); ?>

                                                </div>
                                            </article>
                                        <?php endif; ?> 
                                    </div><!-- .row end -->          
                                </div><!-- .container end -->
                            </section><!-- .page-content.parallax end -->
                        <?php endif; ?>

                        <?php if ($page['bottom']): ?>
                            <section class="page-content bottom2">
                                <div class="container">
                                    <div class="row">
                                        <?php print render($page['bottom']); ?>
                                    </div><!-- .row end -->
                                </div><!-- .container end -->
                            </section><!-- .page-content end -->
                        <?php endif; ?> 

			<?php if ($page['bottom_product']): ?>
                            <section class="page-content bottom_product">
                                <div class="container">
                                    <div class="row">
                                        <?php print render($page['bottom_product']); ?>
                                    </div><!-- .row end -->
                                </div><!-- .container end -->
                            </section><!-- .page-content end -->
                        <?php endif; ?>

                        <!-- .footer-wrapper start -->
                        <section class="footer-wrapper">
                            <!-- .footer start -->
                            <footer id="footer">
                                <!-- .container start -->
                                <div class="container">
                                    <!-- .row start -->
                                    <div class="row">

                                        <!-- animated fadeInTop -->
                                        <section class="triggerAnimation animated" data-animate="fadeIn">
                                            <?php if ($page['footer_firstcolumn']): ?>
                                                <!-- .footer-widget-container start -->
                                                <div class="grid_3 footer-widget-container">                             
                                                    <!-- .widget.widget_text start -->
                                                    <div class="widget widget_text clearfix">
                                                        <?php print render($page['footer_firstcolumn']); ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>


                                            <?php if ($page['footer_secondcolumn']): ?>
                                                <!-- .footer-widget-container start -->
                                                <div class="grid_3 footer-widget-container"> 
                                                    <?php print render($page['footer_secondcolumn']); ?>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($page['footer_thirdcolumn']): ?>
                                                <div class="grid_3 footer-widget-container"> 
                                                    <?php print render($page['footer_thirdcolumn']); ?>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($page['footer_fourthcolumn']): ?>
                                                <div class="grid_9 footer-widget-container"> 
                                                    <?php print render($page['footer_fourthcolumn']); ?>
                                                </div>
                                            <?php endif; ?>

                                        </section>
                                    </div><!-- .row end -->
                                </div><!-- .container end -->                
                            </footer><!-- .footer-end -->

                            <!-- .copyright-container start -->
                            <div class="copyright-container">
                                <!-- .container start -->
                                <div class="container">
                                    <!-- .row start -->
                                    <div class="row">
                                        <section class="grid_6">
                                            <?php if ($page['footer-a']): ?>
                                                <?php print render($page['footer-a']); ?>
                                            <?php endif; ?>  
                                        </section>

                                        <section class="grid_6 credits">
                                            <?php if ($page['footer-b']): ?>
                                                <?php print render($page['footer-b']); ?>
                                            <?php endif; ?>
                                        </section>
                                    </div><!-- .row end -->
                                </div><!-- .container end -->
                            </div><!-- .copyright-container end -->

                            <a href="#" class="scroll-up">Scroll</a>
                        </section><!-- .footer-wrapper end -->