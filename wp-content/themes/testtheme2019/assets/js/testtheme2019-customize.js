//Скрипт
(function($) {
    //Для ссылок
    wp.customize('testtheme2019_link_color', function(value) {
        value.bind(function(newval) {
            //Обращение к ссылкам
            $('a').css('color', newval);
        });
    });
    // Для телефона
    wp.customize('testtheme2019_phone', function(value) {
        value.bind(function(newval) {
            //Обращение к ссылкам
            $('.testtheme2019-phone span').text(newval);
        });
    });
    //Для чекбокса показа номера
    wp.customize('testtheme2019_show_phone', function(value) {
        value.bind(function(newval) {
            //Обращение к чекбоксу тернарным оператором
            false === newval ? $('.testtheme2019-phone').fadeOut() : $('.testtheme2019-phone').fadeIn();
        });
    });

})(jQuery);