(function ($) {
    Drupal.behaviors.CustomProductoMenu = {
        attach: function (context, settings) {
            $('a.display_mobile_menu', context).not('.processed').click(function (e) {
                e.preventDefault();
                $('.mobile_menu > div.item-list > ul').toggle("slow");
                if ($(this).is(':visible') && $('div.selected').length > 0 && !$('.selected').is(':visible')) {
                    $('div.selected').show();
                }
            }).addClass('processed');
            $('.mobile_menu > div.item-list > ul > li', context).not('.processed').each(function (index, element) {
                $(element).addClass('processed');
                $('> a', element).click(function (e) {
                    e.preventDefault();
                    var ul = $(this).next().find('> ul');
                    $(ul).toggle('show', function () {
                        $('.mobile_menu > div.item-list > ul > li > div.item-list > ul').not(ul).hide();
                    });

                });
            });
            if ($('.mobile_menu:not(.processed) a.active', context).length > 0) {
                var div = $('<div>')
                        .addClass('selected');

                var a1 = $('.mobile_menu a.active', context).parents().eq(3).find('>a').clone();
                var parents1 = $('.mobile_menu a.active', context).parents().eq(3);
                $(div).append(a1);
                var a2 = $('.mobile_menu a.active', context).clone();
                $(div).append(a2);

                $(a1).click(function (e) {
                    e.preventDefault();
                    $(parents1).parent().show('slow');
                    $(parents1).find('div.item-list > ul').show('slow');
                    $('div.selected').hide();
                });

                $(div).insertAfter($('.mobile_menu', context));
                $('.mobile_menu', context).addClass('processed');
            }
        }
    };
})(jQuery);

        