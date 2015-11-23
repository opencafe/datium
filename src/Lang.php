<?php namespace Datium\Tools;

/************************************************************
 * Lang class tranlate every expresion according to lang
 ************************************************************
 *
 * table in lang folder
 * @since Aug, 21 2015
 *
 *\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\
 */
class Lang {

    /**
     * Store language table
     * @var array
     */
    protected static $langTable;

    /**
     * Language translated words
     * @var array
     */
    protected static $config;

    /************************************************************
     * Return translated expression
     ************************************************************
     *
     * @since Aug, 21 2015
     * @param text string
     * @return mixed
     *
     *\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\
     */
    public static function get( $text ) {

      /**
       * Fetch translated file to config attribute
       */
      self::$config = include('Config.php');

      /**
       * Fetch translated expression to langTable attribute
       */
      self::$langTable = include('lang/' . self::$config['language'] . '/general.php');

      foreach( self::$langTable as $key => $translate ){

        if( $key == $text ) {

          return $translate;

        }

      }

      return FALSE;

    }


}
