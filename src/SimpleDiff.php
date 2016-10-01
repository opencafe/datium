<?php

namespace OpenCafe\Tools;

use OpenCafe\Tools\Lang;
use OpenCafe\Datium;

/**
* Calculate Time ago with current date difference
*
* @package OpenCafe\Datium
* @since Jun 17, 2016
*/
class SimpleDiff
{

    /**
     * Used language to setted for simple difference
     * @var string
     */
    private $language;

    /**
     * class final result
     * @var object
     */
    private $result;

    /**
     * @var array
     */
    private $blockList;

    /**
    * SimpleDiff Class constructure
    *
    * @param DateTime $time_difference The time to calculate with now
    * @param string $lang Language
    */
    public function __construct($start, $end, $difference )
    {

      $this->language = 'en';

      $this->result =  $difference;

      $this->blockList = [
        'just-now'
      ];

    }

    /**
    * Return difference period as an object
    *
    * @return object
    */
    public function all()
    {

      return $result->result;

    }

    /**
    * Read ago config file
    *
    * @param integer $date date index in ago config file
    * @param string $type duration type on ago config file
    */
    public function read( $value, $type )
    {

      $config = include __DIR__ . '/config/diff.php';

      if( $this->result->invert ) {

        $time = ' ' . Lang::get( $this->language, 'remaining' );

      } else {

        $time = ' ' . Lang::get( $this->language, 'ago' );

      }

      if( isset( $config[ $type ][ $value ] ) && in_array(

                $config[ $type ][ $value ],

                $this->blockList

                ) ) {

                $time = null;

                }

      if( array_key_exists( $value, $config[ $type ] ) ) {

        $str = Lang::get( $this->language, $config[ $type ][ $value ] )
               . $time;

        return $str;

      } else {

        return Lang::getNumbers( $this->language, $value ) . " " . Lang::get(
                                          $this->language,
                                          $config[ $type ][ '*' ]
                                        ) . $time;

      }

    }

    /**
    * Show priority of duration
    *
    * @param integer $date date index in ago config file
    * @param string $type duration type on ago config file
    */
    public function priority( $date, $type )
    {

      if( $date != 0 ) {

        return $this->read( $date, $type );

      } else {

        return false;

      }

    }

    public function lang( $value )
    {

      $this->language = $value;

      return $this;

    }

    /**
    * Return fainal SimpleDiff result
    *
    * @return string
    */
    public function get()
    {

      $duration = [
        'year'   =>  $this->result->year,
        'month'  =>  $this->result->month,
        'day'    =>  $this->result->day,
        'hour'   =>  $this->result->hour,
        'minute' =>  $this->result->minute,
        'second' =>  $this->result->second
      ];

      foreach( $duration as $index => $value ) {

        if( $this->priority( $value, $index ) != false ) {

          return $this->priority( $value, $index );

        }

      }

    }
}
