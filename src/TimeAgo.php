<?php

namespace OpenCafe\Tools;

use OpenCafe\Tools\Lang;
use OpenCafe\Datium;
use stdClass;

/**
* Calculate Time ago with current date difference
*
* @package OpenCafe\Datium
* @since Jun 17, 2016
*/
class TimeAgo
{

    private $language;

    private $output;

    /**
    * TimeAgo Class constructure
    *
    * @param DateTime $time_difference The time to calculate with now
    * @param string $lang Language
    */
    public function __construct($time_difference, $lang )
    {

      $this->language = $lang;

      $now   = Datium::now()->object();

      $this->output =  Datium::diff( $now, $time_difference );

      $this->year = $this->output->year;

      $this->month = $this->output->month;

      $this->day = $this->output->day;

      $this->hour = $this->output->hour;

      $this->minute = $this->output->minute;

      $this->second = $this->output->second;

    }

    /**
    * Return difference period as an object
    *
    * @return object
    */
    public function all()
    {

      return $result->output;

    }

    /**
    * Read ago config file
    *
    * @param integer $date date index in ago config file
    * @param string $type duration type on ago config file
    */
    public function read( $value, $type )
    {

      $config = include 'config/ago.php';

      if( array_key_exists( $value, $config[ $type ] ) ) {

        return Lang::get( $this->language, $config[ $type ][ $value ] );

      } else {

        return $value . " " . Lang::get( $this->language, $config[ $type ][ '*' ] );

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

    /**
    * Return fainal TimeAgo result
    *
    * @return string
    */
    public function get()
    {

      $duration = [
        'year'   =>  $this->year,
        'month'  =>  $this->month,
        'day'    =>  $this->day,
        'hour'   =>  $this->hour,
        'minute' =>  $this->minute,
        'second' =>  $this->second
      ];

      foreach( $duration as $index => $value ) {

        if( $this->priority( $value, $index ) != false ) {

          return $this->priority( $value, $index );

        }

      }

    }
}
