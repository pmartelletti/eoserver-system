(function ($) {
    Drupal.behaviors.CustomProductoMenu = {
        attach: function (context, settings) {
            $('.productos_filtro_categoria > .content > .item-list > ul li > .item-list', context).hide();
            $('.productos_filtro_categoria > .content > .item-list > ul > li').has('div.item-list').each(function (index, element) {
                $(element).find(' > a', context).click(function (e) {
                    e.preventDefault();
                });
                $(element).find(' > a', context).addClass('has-childrens');
                $(element).find(' > a', context).toggle(
                        function () {
                            var _this = $(this);
                            $(_this).addClass('expanded');
                            $(_this).next().show();
                        },
                        function () {
                            var _this = $(this);
                            $(_this).removeClass('expanded');
                            $(_this).next().hide();
                        }
                );
                $('.productos_filtro_categoria > .content > .item-list > ul li > .item-list').has('a.active').show()
                $('.productos_filtro_categoria > .content > .item-list > ul li > .item-list').has('a.active').parent().find(' > a').addClass('active');
            });
        }
    };
})(jQuery);

        