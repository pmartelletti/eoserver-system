<li class="blog-post format-standard">
                            <div class="post-media-container">
                             <?php if(!empty($fields['field_before_title']->content)) : ?>
                             <?php print $fields['field_before_title']->content; ?>
                             <?php endif; ?>
                             <?php if(!empty($fields['field_image']->content)) : ?>
                             
                             <a href="<?php print $fields['path']->content; ?>">
                                      <?php print $fields['field_image']->content; ?>
                             </a>

                             <?php endif; ?>
                      
                            
                            </div><!-- .post-media-container -->

                            <!-- .post-info start -->
                            <ul class="post-info">
                                <li class="post-date">
                                    <span class="day"><?php print $fields['created_2']->content; ?></span>
                                    <span class="month"><?php print $fields['created_1']->content; ?></span>
                                </li>

                                <li class="post-category">
                                    <?php print $fields['field_icon']->content; ?>
                                </li>
                            </ul><!-- .post-info end -->

                            <!-- .post-body start -->
                            <article class="post-body">
                            <a href="<?php print $fields['path']->content; ?>">
                                     <h3><?php print $fields['title']->content; ?></h3>
                                </a>
                             
                                 <ul class="post-metas">
                                    <li class="icon-clock">
                                        <span><?php print $fields['created']->content; ?></span>
                                    </li>
                                    <li class="icon-user">
                                        <?php print $fields['name']->content; ?> 
                                    </li>

                                    <li class="icon-comments">
                                        <?php print $fields['comment_count']->content; ?>
                                    </li>

                                    <li class="post-tags icon-tags">
                                        <?php print $fields['term_node_tid']->content; ?>
                                    </li><!-- .post-tags end -->

                                </ul><!-- .post-meta end -->
                                <?php print $fields['body']->content; ?>
                                <a class="read-more" href="<?php print $fields['path']->content; ?>">
                                    Read more
                                    <span class="icon-arrow-right-3"></span>
                                </a>
                            </article><!-- .post-body end -->
</li>