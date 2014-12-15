<div <?php isset($item['field_details'][LANGUAGE_NONE][0]) ? print "class=\"flip-container\" ontouchstart=\"this.classList.toggle('hover');\"" : print 'class="" '?>>
    <div class="flipper">
        <div class="front">
            <?php print theme('image_style', array('style_name' => 'galerias_galeria', 'path' => $item['uri'])) ?>
        </div>
        <?php if (isset($item['field_details'][LANGUAGE_NONE][0])): ?>
            <div class="back">
                <?php print $item['field_details'][LANGUAGE_NONE][0]['value'] ?>
            </div>
        <?php endif ?>
    </div>
</div>