<div class="caracteristicas">
    <ul><?php if (!empty($items)): ?>
            <?php foreach ($items as $i => $item) : ?>
                <li><?php
                    if (strpos($item['#title'], ':') !== false) {
                        $item['#title']=str_replace(':', ':&nbsp;<span>', $item['#title']) . '</span>';
                    }
                    print $item['#title'];
                    ?></li>
            <?php endforeach; ?>
        <?php endif;
        ?>
    </ul>
</div>
