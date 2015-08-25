<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of session
 *
 * @author Sergio
 */
class session {
    function __construct() {
        session_start();
    }
    
    public function set($name,$value) {
        $_SESSION[$name]=$value;
    }
    
    public function get($name) {
        $rt=false;
        if(isset($_SESSION[$name])) {
            $rt=$_SESSION[$name];
        }
        return $rt;
    }
    
    public function deleteVar($name) {
        unset ($_SESSION[$name]);
    }
    
    public static function deleteSession() {
        $_SESSION[] = array ();
        session_destroy();
    }
}
