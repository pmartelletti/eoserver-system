(function ($) {
    Drupal.behaviors.CustomProductoMenu = {
        attach: function (context, settings) {
            $('a.display_mobile_menu').click(function (e) {
                e.preventDefault();
                //$(".productos_filtro_categoria ul").toggle("slow");
                //$(".productos_filtro_linea ul").toggle("slow");
                //$(".muestra_producto .opciones").toggle("slow");
            });
        }
    };
})(jQuery);

        