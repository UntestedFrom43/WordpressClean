//Скрипт
(function($) {
    wp.customize('testtheme2019_link_color', function(value) {
        value.bind(function(newval) {
            //Обращение к ссылкам
            $('a').css('color', newval);
        });
    });

})(jQuery);