<div <?php isset($item['field_details'][LANGUAGE_NONE][0]) ? print "class=\"flip-container\" ontouchstart=\"this.classList.toggle('hover');\"" : print 'class="no-flip-container" '?>>
    <div class="flipper">
        <div class="front">
            <?php //print theme('image_style', array('style_name' => 'galerias_galeria', 'path' => $item['uri'])) ?>
            <?php
            print theme('lightbox2_image', array(
            		'image_style' => 'galerias_galeria', 
            		'item' => $item,
            		'lightbox_type'=>'lightbox',
            )); ?>
        </div>
        <?php if (isset($item['field_details'][LANGUAGE_NONE][0])): ?>
            <div class="back">
                <?php print $item['field_details'][LANGUAGE_NONE][0]['value'] ?>
            </div>
        <?php endif ?>
    </div>
</div>
<!-- lightbox2__lightbox__thumbnail__original  -->