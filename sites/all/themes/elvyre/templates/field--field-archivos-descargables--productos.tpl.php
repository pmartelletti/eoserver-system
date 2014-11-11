<?php if (!empty($items[0])): ?>
    <li><a target="_blank" href="<?php print file_create_url($items[0]['#file']->uri) ?>" type="<?php print $items[0]['#file']->filemime ?>">Descargar folleto</a></li>
<?php endif; ?>