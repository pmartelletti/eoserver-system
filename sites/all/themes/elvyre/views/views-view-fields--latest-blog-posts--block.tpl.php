<li class='post'>
     <div class="post-media-container">
         <a href="blogsingle.html">
            <img src="<?php print image_style_url('270x212', $row->_field_data['nid']['entity']->field_front_blog_image['und'][0]['uri']);?>" alt="Image"/>
         </a>

            <div class="post-media-hover">
             <a href="<?php print $fields['path']->content; ?>" class="mask"></a>
               </div>
     </div>

          <a href="<?php print $fields['path']->content; ?>">
           <h5><?php print $fields['title']->content; ?></h5>
           </a>

           <ul class="post-meta">
             <li class="icon-clock">
               <span><?php print $fields['created']->content; ?></span>
             </li>
             <li class="icon-user">
              <?php print $fields['name']->content; ?>
              </li>

              <li class="icon-comments">
               <?php print $fields['comment_count']->content; ?>
              </li>
              </ul><!-- .post-meta end -->
</li>