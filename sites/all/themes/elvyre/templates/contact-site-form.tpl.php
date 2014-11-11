<?php

  drupal_add_js('http://maps.google.com/maps/api/js?sensor=true', 'external');
  drupal_add_js(path_to_theme() . "/js/jquery.ui.map.full.min.js");
  ?>
 <div class="row">

                    <!-- .grid_12 start -->
                    <div class="grid_12 alpha">
                        <div class="map_canvas triggerAnimation animated" data-animate="fadeInDown"></div>
                    </div><!-- .grid_12 end -->
                </div><!-- .row end -->

                <!-- .row start -->
                <div class="row">
                    <!-- .grid_6 start -->
                    <article class="grid_6 alpha">
                        <div class="triggerAnimation animated" data-animate="fadeInLeft">
                            <section class="heading-bordered">
                                <h3>Some Information</h3>
                            </section><!-- .heading-bordered end -->

                            <p>
                                Our professional team is here for you 24/7, so 
                                please don't hesitate to contact us if you have any 
                                questions, problems or maybe suggestion. We would 
                                love to hear from you.

                                <br /><br />

                                You can reach us on email address by filling out 
                                the form on the right, or meet with us in person on 
                                some of the addresses below. Just make shore you
                                make an appointment first. Contact information is shown below.
                            </p>

                            <br /><br />

                            <ul class="contact-info-list">
                                <li>
                                    <p>
                                        <i class="icon-home"></i>
                                        <span class="strong">Address: </span>
                                        Some Street 123, Second Sunrise Avenue, Manhattan,
                                        New York, USA
                                    </p>
                                </li>

                                <li>
                                    <p>
                                        <i class="icon-phone"></i>
                                        <span class="strong">Telephone: </span>
                                        +41 589 7852
                                    </p>
                                </li>

                                <li>
                                    <p>
                                        <i class="icon-phone"></i>
                                        <span class="strong">Fax: </span>
                                        +41 589 7843
                                    </p>
                                </li>
                            </ul>
                        </div><!-- .animated .fadeInRight -->
                    </article><!-- .grid_6 end -->

                    <!-- .grid_6 start -->
                    <article class="grid_6 rb omega">
                        <div class="triggerAnimation animated" data-animate="fadeInRight">
                            <section class="heading-bordered mt">
                                <h3>Send us a message</h3>
                            </section><!-- .heading-bordered end -->
                          <?php print $contact; ?>
                        </div><!-- .animated.fadeInRight end -->
                    </article><!-- .grid_6 end -->
                </div><!-- .row end -->



