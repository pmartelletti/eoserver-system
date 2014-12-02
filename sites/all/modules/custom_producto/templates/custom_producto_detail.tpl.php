<div class="muestra_producto grid_12 alpha">
    <div class="opciones">
        <ul>
            <?php
            $field = field_view_field('node', $node, 'field_archivos_descargables', 'full');
            print render($field);
            ?>
            <li><a href="/distribuidores">&iquest;Donde comprar?</a></li>

            <?php
            if (!empty($node->field_url)) {
                $field = field_view_field('node', $node, 'field_url', 'full');
                $html = render($field);
                print $html;
            }
            ?>
        </ul>
        <?php
        $block = module_invoke('views', 'block_view', 'productos_archivos-block');
        unset($block['subject']);
        print render($block);
        ?>
    </div>
    <div class="detalle">
        <?php
        $field = field_view_field('node', $node, 'body', 'full');
        print render($field);
        ?>
        <?php if (false): ?>
            <div class="embalaje">
                <div class="titulo">pieza por caja</div>

                <div class="unidad">10 u.</div>
            </div>

            <div class="embalaje">
                <div class="titulo">peso por caja</div>

                <div class="unidad">100kg.</div>
            </div>

            <div class="embalaje">
                <div class="titulo">sup. por caja</div>

                <div class="unidad">50 mts.</div>
            </div>

            <div class="embalaje">
                <div class="titulo">caja por palet</div>

                <div class="unidad">5 c.</div>
            </div>

            <div class="embalaje">
                <div class="titulo">sup. por palet</div>

                <div class="unidad">100 mts.</div>
            </div>
        <?php endif; ?>
    </div>

    <div class="right">
        <?php
        $field = field_view_field('node', $node, 'field_imagenes_de_ambiente', 'full');
        if (!empty($field['#items'])):
            ?>
            <div class="imagenes">
                <div class="triggerAnimation animated" data-animate="fadeInLeft">
                    <ul id='services-carousel' class='carousel-li'>
                        <?php
                        foreach ($field['#items'] as $item):
                            $image_principal = image_style_url('productos_imagen_ambientes', $item['uri']);
                            $image_zoom = file_create_url($item['uri']);
                            ?>
                            <li class="service-box-1"><img class="images_zoom" src="<?php print $image_principal ?>" data-zoom-image="<?php print $image_zoom ?>"/></li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="clearfix"></div>
                    <?php if(count($field['#items'])> 1):?>
                    <ul class="carousel-nav">
                        <li>
                            <a class="c_prev" href="#"></a> 
                        </li>
                        <li>
                            <a class="c_next" href="#"></a>
                        </li>
                    </ul>
                    <?php endif;?>
                </div><!-- .triggerAnimation animated end -->

            </div>



        <?php endif ?>
        <?php
        $block = module_invoke('views', 'block_view', 'productos_misma_categoria-block');
        unset($block['subject']);
        print render($block);
        ?>
        <?php if (false): ?>
            <div class="colores">
                <h3>colores disponibles:</h3>
                <ul>
                    <li><img alt="" src="http://dummyimage.com/98x98/000/fff&amp;text=colores" style="height:98px; width:98px" /><br />
                        claro</li>
                    <li><img alt="" src="http://dummyimage.com/98x98/000/fff&amp;text=colores" style="height:98px; width:98px" /><br />
                        oscuro</li>
                </ul>
            </div>
        <?php endif ?>
    </div>
</div>
