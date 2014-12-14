(function ($) {
    Drupal.behaviors.propAdWidgetCreate = {
        attach: function (context, settings) {
            var self = this;
            var $select = $('#' + settings.propAdWidgetCreate.id);
            $select.hide();
            $.each(settings.propAdWidgetCreate.parents, function (index, parent) {
                var $element = $('<select>')
                        .addClass('select')
                        .attr('multiple', 'multiple')
                        //.attr('name', settings.propAdWidgetCreate.name+'['+index+'][]')
                        //.attr('name', 'field_propiedad_adicional_custom['+index+'][]')
                        .attr('name', settings.propAdWidgetCreate.name + '[]')
                        .html(Drupal.behaviors.propAdWidgetCreate.getOptions(settings.propAdWidgetCreate, index))
                        ;
                var $label = $('<label>')
                        .html(parent)
                        ;
                var $wrapper = $('<div>')
                        .addClass('content-field-propiedades')
                        .addClass('content-field-propiedades-' + index)
                        ;
                $label.appendTo($wrapper);
                $element.appendTo($wrapper);
                $($wrapper).appendTo($select.parent());
            });
            $select.parent().addClass('clearfix');
            $select.remove();
        },
        getOptions: function (settings, index) {
            var options = '';
            $.each(settings.childrens[index], function (index, name) {
                var selected = '';
                if (settings.default_value.indexOf(index) > -1) {
                    selected = 'selected=selected';
                }
                options += '<option ' + selected + ' value="' + index + '">' + name + '</option>'
            });
            return options;
        },
    };
})(jQuery);
