<?php
/**
    kePHPik Framework
    A buggy little flying framework

    Please check https://github.com/panahbiru/kephpik
    
    (c) 2015 Luthfi Emka, SistemInformasi.biz
    License: GPLv2
**/include "conf.php";@session_start();Class Core{ public function __construct(){$request=parse_uri($_SERVER['PATH_INFO']);$controller=ucfirst($request[0]);$method=$request[1];if(empty($controller))$controller='Home';if(empty($method))$method='index';if(file_exists(PATH.'controllers/'.$controller.'.php')){include PATH.'controllers/'.$controller.'.php';$this->$controller=new $controller;$cnt=count($request);if($cnt>1){unset($request[0]);unset($request[1]);if(method_exists($this->$controller,$method)){call_user_func_array(array($this->$controller,$method),$request);}else{die_("Methods not exists.");}}else{call_user_func(array($this->$controller,$method));}}else{die_("Controllers not exists.");}}}Class Controller{ public function __construct(){//session
$this->session=new Session();} public function model($classname,$newmodelname=''){$class_name=ucfirst($classname);if(file_exists(PATH.'models/'.$class_name.'.php')){require_once PATH.'models/'.$class_name.'.php';$namamodel='Model'.$class_name;if(empty($newmodelname)){$this->$classname=new $namamodel;}else{$this->$newmodelname=new $namamodel;}}else{die_("Models not exists.");}} public function output($file,$data=''){if(file_exists(PATH.'views/'.$file.'.php')){if(!empty($data)){extract($data,EXTR_SKIP);}require_once PATH.'views/'.$file.'.php';}} public function helper($name){if(file_exists(PATH.'helpers/'.$name.'.php')){require_once PATH.'helpers/'.$name.'.php';}}}Class Db{ public function __construct(){require_once "ezsql.php";$__db=new ezSQL_mysqli('root','','sibiz_store','localhost');$this->db=$__db;}}Class Session{ public function setValue($name,$value=''){if(\is_array($name)){foreach($name AS $key=>$val)$_SESSION[$key]=$val;}else {$_SESSION[$name]=$value;}} public function getValue($name){if(isset($_SESSION[$name]))return $_SESSION[$name];else return false;} public function getAllValue(){if(isset($_SESSION)){return $_SESSION;}else {return false;}} public function deleteValue($name){unset($_SESSION[$name]);} public function destroy(){session_unset();session_destroy();}}function site_url(){global $CONFIG;return $CONFIG['site_url'];}function css_url(){global $CONFIG;return $CONFIG['css_url'];}function site_title(){global $CONFIG;return $CONFIG['site_title'];}function get_conf($key){global $CONFIG;return $CONFIG[$key];}function read_flatdb($table){$path=dirname(__FILE__).'/flatdb/';if(file_exists($path.$table.'.db')){$data=file_get_contents($path.$table.'.db');return $data;}else{return 'database not available';}}function parse_flatdb($table){$path=dirname(__FILE__).'/flatdb/';if(file_exists($path.$table.'.db')){$raw=file_get_contents($path.$table.'.db');$data=explode("\n",$raw);$cnt=count($data)-1;unset($data[$cnt]);return $data;}else{return 'database not available';}}function parse_uri($uri){$raw=explode("/",$uri);foreach($raw as $r){if(empty($r))continue;$hasil[]=$r;}return $hasil;}function die_($messages,$custom_title='404 Page Not Found'){die('
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <title>'.$custom_title.'</title>
    <style type="text/css">             ::selection{background-color:#E13300;color:#fff}::moz-selection{background-color:#E13300;color:#fff}::webkit-selection{background-color:#E13300;color:#fff}body{background-color:#fff;margin:40px;font:13px/20px normal Helvetica,Arial,sans-serif;color:#4F5155}a{color:#039;background-color:transparent;font-weight:400}h1{color:#444;background-color:transparent;border-bottom:1px solid #D0D0D0;font-size:19px;font-weight:400;margin:0 0 14px;padding:14px 15px 10px}code{font-family:Consolas,Monaco,Courier New,Courier,monospace;font-size:12px;background-color:#f9f9f9;border:1px solid #D0D0D0;color:#002166;display:block;margin:14px 0;padding:12px 10px}#container{margin:10px;border:1px solid #D0D0D0;-webkit-box-shadow:0 0 8px #D0D0D0}p{margin:12px 15px}
    </style>
    </head>
    <body>
        <div id="container">
            <h1>'.$custom_title.'</h1>
            <p>'.$messages.'</p>
        </div>
    </body>
    </html>
    ');}
