<?php if ($teaser): ?>
                         <div class="blog-post format-standard">
                          <div class="post-media-container">
                            <?php if (render($content['field_before_title'])) : ?>
	                        <?php print render($content['field_before_title']); ?>
                            <?php endif; ?>
                            <?php if (!empty($content['field_image'])) : ?>
	                          <a href="<?php print $node_url; ?>">
                               <img src="<?php echo file_create_url($node->field_image['und'][0]['uri']); ?>" alt="img" >
                              </a>

                                <div class="post-media-hover">
                                    <a href="<?php print $node_url; ?>" class="mask"></a>
                                </div>

	                        <?php endif; ?>

                            </div><!-- .post-media-container -->

                            <!-- .post-info start -->
                            <ul class="post-info">
                                <li class="post-date">
                                    <span class="day"><?php print format_date($node->created, 'custom', 'd'); ?></span>
                                    <span class="month"><?php print format_date($node->created, 'custom', 'M'); ?></span>
                                </li>
                               <?php if (render($content['field_icon'])) : ?>
                                <li class="post-category">
                                    <?php print render($content['field_icon']); ?>
                                </li>
                                 <?php endif; ?>
                            </ul><!-- .post-info end -->
                            
                            <!-- .post-body start -->
                            <article class="post-body">
                                <?php print render($title_prefix); ?>
                                <a href="<?php print $node_url; ?>">
                                    <h3><?php print $title; ?></h3>
                                </a>
                               
                                <ul class="post-meta">
                                    <li class="icon-clock">
                                        <span><?php print format_date($node->created, 'custom', 'M d, Y'); ?></span>
                                    </li>
                                    <li class="icon-user">
                                         <?php print $name; ?>
                                    </li>

                                    <li class="icon-comments">
                                        <a href="<?php print $node_url;?>/#comments"><?php print $comment_count; ?> comment<?php if ($comment_count != "1" ) { echo "s"; } ?></a>
                                    </li>
 
			                        <li class="post-tags icon-tags">
									<?php
// Query database table taxonomy_term_data and taxonomy_index
// So I can get all terms from my node.
$term = db_query('SELECT t.name, t.tid FROM {taxonomy_index} n LEFT JOIN  {taxonomy_term_data} t ON (n.tid = t.tid) WHERE n.nid = :nid', array(':nid' => $node->nid));

// db_query in Drupal 7 returns a stdClass object. 
// Value names are corresponding to the fields in your SQL query 
//(in our case "t.name") AND t.tid for build path.
$tags = '';
foreach ($term as $record) {
  // I put l() function for make my links.
  $tags .= l($record->name, 'taxonomy/term/' . $record->tid) . ' ';
}

print ' ' . $tags;
?>
                                    </li><!-- .post-tags end -->
 
                                    
                                </ul><!-- .post-meta end -->
                               <?php
      
                               hide($content['comments']);
                               hide($content['links']);
                               hide($content['field_image']);
                               print render($content);
                               ?>

                                 <?php if($teaser): ?>
                                 <a class="read-more" href="<?php print $node_url;?>">
                                    Read more
                                    <span class="icon-arrow-right-3"></span>
                                </a>
	                             <?php endif;?>
                                </article>
                            
                            
                            </div><!-- .kraj -->
                                
<?php endif;?>

<?php if (!$teaser): ?>

                        <div class="blog-post format-standard">
                          <div class="post-media-container">
                            <?php if (render($content['field_before_title'])) : ?>
	                        <?php print render($content['field_before_title']); ?>
                            <?php endif; ?>
                            <?php if (!empty($content['field_image'])) : ?>

                               <img src="<?php echo file_create_url($node->field_image['und'][0]['uri']); ?>" alt="img" >


	                        <?php endif; ?>

                            </div><!-- .post-media-container -->

                            <!-- .post-info start -->
                            <ul class="post-info">
                                <li class="post-date">
                                    <span class="day"><?php print format_date($node->created, 'custom', 'd'); ?></span>
                                    <span class="month"><?php print format_date($node->created, 'custom', 'M'); ?></span>
                                </li>
                               <?php if (render($content['field_icon'])) : ?>
                                <li class="post-category">
                                    <?php print render($content['field_icon']); ?>
                                </li>
                                 <?php endif; ?>
                            </ul><!-- .post-info end -->

                            <!-- .post-body start -->
                            <article class="post-body">
                                <?php print render($title_prefix); ?>
                                <a href="<?php print $node_url; ?>">
                                    <h3><?php print $title; ?></h3>
                                </a>
                               
                                <ul class="post-meta">
                                    <li class="icon-clock">
                                        <span><?php print format_date($node->created, 'custom', 'M d, Y'); ?></span>
                                    </li>
                                    <li class="icon-user">
                                         <?php print $name; ?>
                                    </li>

                                    <li class="icon-comments">
                                        <a href="<?php print $node_url;?>/#comments"><?php print $comment_count; ?> comment<?php if ($comment_count != "1" ) { echo "s"; } ?></a>
                                    </li>

                                    <?php if (render($content['field_tags'])): ?>  
			                        <li class="post-tags icon-tags">
									<?php
// Query database table taxonomy_term_data and taxonomy_index
// So I can get all terms from my node.
$term = db_query('SELECT t.name, t.tid FROM {taxonomy_index} n LEFT JOIN  {taxonomy_term_data} t ON (n.tid = t.tid) WHERE n.nid = :nid', array(':nid' => $node->nid));

// db_query in Drupal 7 returns a stdClass object. 
// Value names are corresponding to the fields in your SQL query 
//(in our case "t.name") AND t.tid for build path.
$tags = '';
foreach ($term as $record) {
  // I put l() function for make my links.
  $tags .= l($record->name, 'taxonomy/term/' . $record->tid) . ' ';
}

print ' ' . $tags;
?>
                                    
                                    </li><!-- .post-tags end -->
			                        <?php endif; ?>  
                                </ul><!-- .post-meta end -->
                               <?php
      
                               hide($content['comments']);
                               hide($content['links']);
                               hide($content['field_image']);
                               print render($content);
                               ?>
                               
                               
                                <?php print render($content['comments']); ?>
                                
                                </article>
                        </div>

                                
<?php endif;?>