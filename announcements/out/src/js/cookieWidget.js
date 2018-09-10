( function ($) {
    widget = {
        options: {
            closeButton : ".btn"
        },
        _create: function() {
            var self = this;
            $(self.options.closeButton).on('click', function() {
                self.element.modal('hide');
                $.cookie('showAnnouncement', 'false', {
                    path: '/',
                    expires: 1
                });
            });
        }
    };

    $.widget("custom.makeCookie", widget);
})(jQuery);

$('<div class="cookie-widget"></div>').appendTo("body").makeCookie({value: 20});
