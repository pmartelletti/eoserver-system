
<section id="comments" class="<?php print $classes; ?>" <?php print $attributes; ?>>
<article class="post-comments mt80">

  <?php if ($content['comments'] && $node->type != 'forum'): ?>
    <?php print render($title_prefix); ?>
     <div class="page-title clearfix">
    	<h4><?php print format_plural($content['#node']->comment_count, '1 comment', '@count comments'); ?><?php print t(' on ').'"'.$content['#node']->title.'"' ?></h4>
     </div>
    <?php print render($title_suffix); ?>
  <?php endif; ?>
  
   <?php if ($content['comments'] && $node->type != 'forum'): ?>
  <div class="comments-content-wrap">
    <?php print render($content['comments']); ?>
  </div>  
  <?php endif; ?>

  <?php if ($content['comment_form']): ?>
  <div id="respond">
    <section id="reply-title">
    <div class="page-title clearfix">
      <h4 id="reply-title"><?php print t('Leave a Reply'); ?></h4>
      </div> 
      <?php print render($content['comment_form']); ?>
    </section> <!-- /#comment-form-wrapper -->
  </div>  
  <?php endif; ?>
</article> <!-- /.comm-wrapper --> 
</section> <!-- /#comments -->


