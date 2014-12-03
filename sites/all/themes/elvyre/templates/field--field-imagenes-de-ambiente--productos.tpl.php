<div class="field-imagenes-de-ambientes">
    <ul id="ambientes-carousel">
        <?php foreach ($items as $item): ?>
            <li><?php print render($item) ?></li>
        <?php endforeach; ?>
    </ul>
    <div class="clearfix"></div>
    <div id="ambientes-pagination"></div>
</div>