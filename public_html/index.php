<?php
ini_set('display_errors', 'On');
setlocale(LC_MONETARY, 'id_ID');
error_reporting(~E_WARNING && ~E_STRICT);

define('PATH', dirname(__DIR__).'/' );
define('VENDOR', dirname(__DIR__).'/');
define('THISPATH', dirname(__FILE__).'/');
define('TBPREFIX', '');
/**
 * Autoload Composer
 */
require_once VENDOR.'vendor/autoload.php';

/**
 * Load KePHPik Framework
 */
require_once VENDOR.'kephpik.php';
require_once PATH.'conf.php';
/**
 * Whoops Error
 */
use Whoops\Handler\PrettyPageHandler;
use Whoops\Handler\JsonResponseHandler;
$whoops     = new Whoops\Run;
$whoops->pushHandler(new Whoops\Handler\PrettyPageHandler());
$whoops->register();
$kephpik = new Core();