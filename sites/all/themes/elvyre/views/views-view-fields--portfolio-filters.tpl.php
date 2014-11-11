<?php foreach ($fields as $id => $field): ?>
  <li><a data-categories="<?php print str_replace(' ', '-', $field->content); ?>"><?php print $field->content; ?></a></li>
<?php endforeach; ?>