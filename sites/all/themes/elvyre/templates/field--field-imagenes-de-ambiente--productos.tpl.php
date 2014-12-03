<ul id="ambientes-carousel">
    <?php
    foreach ($items as $item):?>
        <li><?php print render($item) ?></li>
    <?php endforeach; ?>
</ul>
<?php if (count($items) > 1): ?>
    <div class="clearfix"></div>    
    <ul class="carousel-nav">
        <li>
            <a class="c_prev"></a> 
        </li>
        <li>
            <a class="c_next"></a>
        </li>
    </ul>
<?php endif; ?>