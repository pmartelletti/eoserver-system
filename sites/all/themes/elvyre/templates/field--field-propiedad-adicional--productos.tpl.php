<div class="caracteristicas">
    <ul><?php if (!empty($items)): ?>
            <?php
            $list = array();
            foreach ($items as $i => $item) :
                ?>
                <?php
                if (isset($item['#items'][0]['data']) && isset($item['#items'][1]['data'])) {
                    $list[$item['#items'][0]['data']] = $item['#items'][1]['data'];
                }
                ?>
            <?php endforeach; ?>
            <?php if (!empty($list)): ?>
                <?php
                foreach ($list as $key => $value) :
                    print "<li>$key: <b>$value</b></li>";
                endforeach;
                ?>
            <?php endif; ?>
        <?php endif;
        ?>
    </ul>
</div>
