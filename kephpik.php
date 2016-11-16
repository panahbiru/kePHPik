<?php
include "conf.php";
@session_start();
Class Core {
    public function __construct() {
        $request = parse_uri($_SERVER['PATH_INFO']);
        $controller = ucfirst($request[0]);
        
        if(isset($_POST))
        {
            $method = 'post'.ucfirst($request[1]);
        }else{
            $method = 'get'.ucfirst($request[1]);
        }

        if (empty($controller)) $controller = 'Home';
        if (empty($method)) $method = 'index';
        if (file_exists(PATH . 'controllers/' . $controller . '.php')) {
            include PATH . 'controllers/' . $controller . '.php';
            $this->$controller = new $controller;
            $cnt = count($request);
            if ($cnt > 1) {
                unset($request[0]);
                unset($request[1]);
                if (!method_exists($this->$controller, $method)) throw new Exception('Method ' . $method . ' not exist available! on file ' . PATH . 'controllers/' . $controller . '.php');
                call_user_func_array(array($this->$controller, $method), $request);
            } else {
                if (!method_exists($this->$controller, $method)) throw new Exception('Method ' . $method . '  not exist available! on file ' . PATH . 'controllers/' . $controller . '.php');
                call_user_func(array($this->$controller, $method));
            }
        } else {
            throw new Exception('File controller not exist!');
        }
    }
}
Class Controller {
    public function __construct() { //session
        $this->session = new Session();
    }
    public function model($classname, $newmodelname = '') {
        $class_name = ucfirst($classname);
        if (file_exists(PATH . 'models/' . $class_name . '.php')) {
            require_once PATH . 'models/' . $class_name . '.php';
            $namamodel = 'Model' . $class_name;
            if (empty($newmodelname)) {
                $this->$classname = new $namamodel;
            } else {
                $this->$newmodelname = new $namamodel;
            }
        } else {
            throw new Exception('Models not exist, create it or check it first! File: ' . PATH . 'models/' . $class_name . '.php');
        }
    }
    public function output($file, $data = '') {
        if (file_exists(PATH . 'views/' . $file . '.php')) {
            if (!empty($data)) {
                extract($data, EXTR_SKIP);
            }
            try {
                ob_start();
                include PATH . 'views/' . $file . '.php';
                $return = ob_get_contents();
                ob_end_clean();

                return $return;
            }
            catch(Exception $e) {
                throw new Exception($e->getMessage());
            }
        } else {
            throw new Exception('Views not exist, create it or check it first! File: ' . PATH . 'views/' . $file . '.php');
        }
    }
    public function helper($name) {
        if (file_exists(PATH . 'helpers/' . $name . '.php')) {
            require_once PATH . 'helpers/' . $name . '.php';
        } else {
            throw new Exception('Helpers not exist, create it or check it first! File: ' . PATH . 'helpers/' . $name . '.php');
        }
    }
    public function conf() {
        global $CONFIG;
        return array_to_objects($CONFIG);
    }
}
Class Session {
    public function setValue($name, $value = '') {
        if (\is_array($name)) {
            foreach ($name AS $key => $val) $_SESSION[$key] = $val;
        } else {
            $_SESSION[$name] = $value;
        }
    }
    public function getValue($name) {
        if (isset($_SESSION[$name])) return $_SESSION[$name];
        else return false;
    }
    public function getAllValue() {
        if (isset($_SESSION)) {
            return $_SESSION;
        } else {
            return false;
        }
    }
    public function deleteValue($name) {
        unset($_SESSION[$name]);
    }
    public function destroy() {
        session_unset();
        session_destroy();
    }
}
function site_url() {
    global $CONFIG;
    return $CONFIG['site_url'];
}
function css_url() {
    global $CONFIG;
    return $CONFIG['css_url'];
}
function site_title() {
    global $CONFIG;
    return $CONFIG['site_title'];
}
function get_conf($key) {
    global $CONFIG;
    return $CONFIG[$key];
}
function parse_uri($uri) {
    $raw = explode("/", $uri);
    foreach ($raw as $r) {
        if (empty($r)) continue;
        $hasil[] = $r;
    }
    return $hasil;
}
function redirect($num, $url) {
    static $http = array(100 => "HTTP/1.1 100 Continue", 101 => "HTTP/1.1 101 Switching Protocols", 200 => "HTTP/1.1 200 OK", 201 => "HTTP/1.1 201 Created", 202 => "HTTP/1.1 202 Accepted", 203 => "HTTP/1.1 203 Non-Authoritative Information", 204 => "HTTP/1.1 204 No Content", 205 => "HTTP/1.1 205 Reset Content", 206 => "HTTP/1.1 206 Partial Content", 300 => "HTTP/1.1 300 Multiple Choices", 301 => "HTTP/1.1 301 Moved Permanently", 302 => "HTTP/1.1 302 Found", 303 => "HTTP/1.1 303 See Other", 304 => "HTTP/1.1 304 Not Modified", 305 => "HTTP/1.1 305 Use Proxy", 307 => "HTTP/1.1 307 Temporary Redirect", 400 => "HTTP/1.1 400 Bad Request", 401 => "HTTP/1.1 401 Unauthorized", 402 => "HTTP/1.1 402 Payment Required", 403 => "HTTP/1.1 403 Forbidden", 404 => "HTTP/1.1 404 Not Found", 405 => "HTTP/1.1 405 Method Not Allowed", 406 => "HTTP/1.1 406 Not Acceptable", 407 => "HTTP/1.1 407 Proxy Authentication Required", 408 => "HTTP/1.1 408 Request Time-out", 409 => "HTTP/1.1 409 Conflict", 410 => "HTTP/1.1 410 Gone", 411 => "HTTP/1.1 411 Length Required", 412 => "HTTP/1.1 412 Precondition Failed", 413 => "HTTP/1.1 413 Request Entity Too Large", 414 => "HTTP/1.1 414 Request-URI Too Large", 415 => "HTTP/1.1 415 Unsupported Media Type", 416 => "HTTP/1.1 416 Requested range not satisfiable", 417 => "HTTP/1.1 417 Expectation Failed", 500 => "HTTP/1.1 500 Internal Server Error", 501 => "HTTP/1.1 501 Not Implemented", 502 => "HTTP/1.1 502 Bad Gateway", 503 => "HTTP/1.1 503 Service Unavailable", 504 => "HTTP/1.1 504 Gateway Time-out");
    header($http[$num]);
    header("Location: $url");
}
function die_($messages, $custom_title = '404 Page Not Found') {
    throw new Exception($messages);
}
function array_to_objects($arrays) {
    $obj = new stdClass;
    foreach ($arrays as $k => $v) {
        if (strlen($k)) {
            if (is_array($v)) {
                $obj->{$k} = array_to_objects($v);
            } else {
                $obj->{$k} = $v;
            }
        }
    }
    return $obj;
}
?>
