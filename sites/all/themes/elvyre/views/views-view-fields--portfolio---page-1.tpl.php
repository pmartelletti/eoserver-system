<li class="grid_4 isotope-item <?php print $fields['field_portfolio_tags']->content; ?>">
   <figure class="portfolio-img-container">
      <div class="portfolio-img">
         <?php print $fields['field_portfolio_image']->content; ?>
            <div class="portfolio-img-hover">
               <div class="mask"></div>
                  <ul>
                    <li class="portfolio-zoom">
                     <a href="<?php print file_create_url($row->_field_data['nid']['entity']->field_portfolio_image['und'][0]['uri']);?>" 
                                                   data-gal="prettyPhoto[pp_gallery]" class="icon-expand-2"></a>
                    </li>
                    <li class="portfolio-single">
                     <a href="<?php print $fields['path']->content; ?>" class="icon-redo"></a>
                    </li>
                   </ul>
                 </div><!-- .portfolio-img-hover end -->
               </div>
                     <figcaption>
                      <?php print $fields['title']->content; ?>
                      <div class="portfolio-tags"><?php print $fields['field_portfolio_tags_1']->content; ?></div>
                     </figcaption>
    </figure>
</li>
