<?php namespace OpenCafe\Tools;

/**
 * @since Aug, 21 2015
 */
class Leap
{

    /**
   * @param integer store year value
   */
    protected $year;

    /**
   * @param string store type of year value
   */
    protected $type;

    /**
   * @param boolean store result of leap functions
   */
    protected $result;


    /**
   * @param $year integer
   * @since Aug, 21 2015
   */
    public function __construct($year, $type = 'gregorian')
    {

         $this->year = $year;

         $this->type = $type;

         return $this;

    }


    /**
   * return the year is leap or not
   *
   * @since  Aug, 21 2015
   * @return boolean
   */
    public function get()
    {

        $this->result = include 'CalendarSettings/' . ucfirst($this->type) . '.php';

        return $this->result['leap_year']($this->year);

    }
}
