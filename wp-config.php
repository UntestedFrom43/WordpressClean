<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wordpressed' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'w9LJl!:ABzG{D)77i_{BNvt^6 Se=>M]2NF8TW|s1;AO;a6[lb`L:<0CQRY)|@/a' );
define( 'SECURE_AUTH_KEY',  ']bCjr)8EhDP52|&,1%hv`y^9){P |%`P@sJ085ow_f{8^,_^Q%ZZ(TTV))d0h)A4' );
define( 'LOGGED_IN_KEY',    '2Nt?Aw*ZLHHDI`R&a_oTAqwh3opIl^ew0R9|x2&X:8VhDZcbsBf1m(41lV<Rj$0S' );
define( 'NONCE_KEY',        'r`U)^5p{iWM9JdaK~)F`DO4Pd6R9oEy$C+ql*I|I(n;8LTzU1^vuKd^`Sp01&>r ' );
define( 'AUTH_SALT',        '__,r:5DiQH$B>.9>/ bQ1q(eFQ&^?G%l+c{u^Ahudf705yVy u7G)`#=Otj5f8,I' );
define( 'SECURE_AUTH_SALT', 'M]Tk$^Q3>)?BB2L`x~=@>ZN!AgjQ]I$<cP5M:s,IT>|0ovs^oQ[Gopb/Kk#i^A~F' );
define( 'LOGGED_IN_SALT',   'a%j}/$V~E<DlyQEB6g}#|> kU^VxJ=Tl/mbMir[,7PXBEXHhv<K11!XDY=C@pmN5' );
define( 'NONCE_SALT',       'm|K#&Pl+S0DvW%CeW].?^yW0n[7gcq||CcYx9XKUQ.]a.=F.3C){&Ad(WDF`cF]5' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
