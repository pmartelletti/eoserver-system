(function ($) {
    Drupal.behaviors.cpFlip = {
        attach: function (context, settings) {
            $('.field-name-field-imagenes .flipper:not(.process)').each(function(index, element){
            	$(element).find('.back').click(function(e){
            		$(element).find('.front a').trigger('click');
            	});
            	$(element).addClass('process');
            });
        }
    };
})(jQuery);

        