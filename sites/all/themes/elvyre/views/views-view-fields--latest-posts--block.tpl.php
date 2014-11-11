<li>
  <div class="post-media">
    <img src="<?php print image_style_url('70x70', $row->_field_data['nid']['entity']->field_front_blog_image['und'][0]['uri']);?>" alt="Image"/>
  </div>

                                        <div class="widget-post-info">
                                            <a href="<?php print $fields['path']->content; ?>">
                                                <h6><?php print $fields['title']->content; ?></h6>
                                            </a>

                                            <ul class="meta">
                                                <li class="icon-clock">
                                                    <span><?php print $fields['created']->content; ?> ,</span>
                                                </li>

                                                <li class="icon-comments">
                                                    <?php print $fields['comment_count']->content; ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
