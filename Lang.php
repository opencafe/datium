<?php

/**
 * Lang class tranlate every expresion according to lang
 * table in lang folder
 * @since Aug, 21 2015
 */
class Lang {

    /**
     * Store language table
     */
    protected static $lang_table;

    protected static $config;

    /**
     * return value translated value in general file
     * @since Aug, 21 2015
     * @param $lang string
     * @param text string
     * @return mixed
     */
    public static function get( $text ) {

      self::$config = include('Config.php');

      self::$lang_table = include('lang/' . self::$config['language'] . '/general.php');

      foreach( self::$lang_table as $key => $translate ){

        if( $key == $text ) {

          return $translate;

        }

      }

      return FALSE;

    }


}
?>
