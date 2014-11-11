<?php 
global $theme_root;
?>

<ul class="comments-li">
  <li>
      <article class="comment">
		  <div class="avatar">
		    <?php 
		      if (!$picture) {
				 
		        echo '<img src="'.$theme_root.'/img/avatar.png" alt="a" >'; 
		      }
		      else { 
		        print $picture;   
		      }
		    ?>
		  </div>
             <ul class="comment-meta">
                                                    <li>
                                                        <a href="#" class="author"><?php print $author; ?></a> 
                                                    </li>

                                                    <li>
                                                        <?php print format_date($comment->created, 'custom', 'M d, Y'); ?> at <?php print format_date($comment->created, 'custom', 'H:i'); ?>
                                                    </li>
                                                </ul>
                                                
                                                <div class="comment-body">
                                                    <p>
                                                         <?php hide($content['links']); print render($content); ?> 
                                                    </p>

                                                    <?php if (!empty($content['links'])) { print render($content['links']); } ?>
          
          <?php print $new ?>
          


   </article><!-- end article .comment-wrapper --> 
  </li>
</ul>




