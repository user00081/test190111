<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Router
 *
 * @author lucapalo
 */
class Router {
    private static function initialize() {
        if ( self::$initialized )
            return;
        self::$initialized = true;
    }
    public static function varExists( $var ) {
        return isset( $_REQUEST[ $var ] );
    }
    public static function listenPost( $var ) {
        return filter_input( INPUT_POST, $var, FILTER_SANITIZE_STRING );
    }
    public static function listenGet( $var ) {
        return filter_input( INPUT_GET, $var, FILTER_SANITIZE_STRING );
    }
}
