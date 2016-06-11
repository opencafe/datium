<?php namespace OpenCafe\Tools;

/************************************************************
 * Lang class tranlate every expresion according to lang
 ************************************************************
 *
 * table in lang folder
 * @since Aug, 21 2015
 *
 *\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\
 */
class Lang
{

    /**
     * Store language table
     *
     * @var array
     */
    protected static $langTable;

    /**
     * Language translated words
     *
     * @var array
     */
    protected static $config;

    protected static $obj;

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
    public static function setConfig($language)
    {

        /**
       * Fetch translated file to config attribute
       */
        self::$config = include 'src/CalendarSettings/Jalali.php';

        /**
        * Fetch translated expression to langTable attribute
        */
        self::$langTable = include 'lang/' . $language . '/general.php';

        foreach (self::$langTable as $key => $translate) {
            if (isset(self::$config[ $key ])) {
                if (self::$config[ $key ]) {
                    self::$config[ $key ] = $translate;
                }
            }
        }

    }

    public static function getConfig()
    {

        return self::$config;

    }
}
