<section class="widget pi_recent_posts">
     <div class="triggerAnimation animated" data-animate="fadeInRight">
     <ul>
      <?php foreach ($rows as $id => $row): ?>
      <?php print $row; ?>
      <?php endforeach; ?>
	 </ul>
     </div>
</section>