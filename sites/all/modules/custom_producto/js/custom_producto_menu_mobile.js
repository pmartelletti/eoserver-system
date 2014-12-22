(function ($) {
    Drupal.behaviors.CustomProductoMenu = {
        attach: function (context, settings) {
            $('a.display_mobile_menu').not('.processed').click(function (e) {
                e.preventDefault();
                $('.mobile_menu > div.item-list > ul').toggle("slow");
                //$(".productos_filtro_linea ul").toggle("slow");
                //$(".muestra_producto .opciones").toggle("slow");
            }).addClass('processed');
            $('.mobile_menu > div.item-list > ul > li').not('.processed').each(function (index, element) {
                $(element).addClass('processed');
                $('> a', element).click(function (e) {
                    e.preventDefault();
                    var ul = $(this).next().find('> ul');
                    $(ul).toggle('show', function(){
                        $('.mobile_menu > div.item-list > ul > li > div.item-list > ul').not(ul).hide();
                    });
                    
                });
            });
        }
    };
})(jQuery);

        