<?php namespace OpenCafe\Tools;

/************************************************************
 * Convert Calendars types together
 ************************************************************
 *
 * @since Oct 27, 2015
 *
 *\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\
 */
class Convert
{

    /**
   * @var integer
   */
    protected $year;

    /**
   * @var integer
   */
    protected $month;

    /**
   * @var $day
   */
    protected $day;

    /**
   * @var DateTime
   */
    public $date_time;

    /**
   * @var array
   */
    protected $config;

    /**
   * @var integer
   */
    protected $leap;

    /**
   * @var integer
   */
    protected $temp_day;

    /**
   * @var DateTime
   */
    protected $date;

    /**
   * @var array
   */
    protected $calendar_file;

    /************************************************************
    * Convert class constructor
    ************************************************************
    *
    * @since Oct 27, 2015
    *
    *\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\
    */
    public function __construct($date_time = null)
    {

        if ($date_time !== null) {
            $this->date_time = $date_time;
        }

        $this->config = include __DIR__.'/Config.php';

    }

    public function from($calendar)
    {

        $this->calendar_file = include __DIR__.'/CalendarSettings/' . ucfirst($calendar) . '.php';

        return $this->calendar_file[ 'convert_from' ]( $this->date_time );

    }

    /************************************************************
    * Convert to specific calendar
    ************************************************************
    *
    * @since Oct 26, 2015
    *
    *\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\
    */
    public function to($calendar)
    {

        $this->calendar_file = include __DIR__.'/CalendarSettings/' . ucfirst($calendar) . '.php';

        return $this->calendar_file[ 'convert_to' ]( $this->date_time );

    }

    /**
   *convert jalali year to gregorian year
 *
   * @since  Oct, 16 2015
   * @return object
   */
    public function jalaliToGregorian($date_time)
    {

          $this->config = include __DIR__.'/Jalali.php';

          $this->date_time = $date_time;

          $this->year = $this->date_time->format('Y');

          $this->month = $this->date_time->format('m');

          $this->day = $this->date_time->format('d');

          $days_of_year = 0;

        foreach ($this->config[ 'month_days_number' ] as $month => $value) {
            if ($this->month > $month) {
                $days_of_year += $value;
            }
        }

          $days_of_year += $this->day;

          $days_of_leap_years =  intval(( ( $this->year - 1 ) / 4 ));

          $days_of_jalali_years = ( ( ( $this->year - 1 ) * 365 ) + $days_of_year + $days_of_leap_years );

          $days_of_gregorain_years = $days_of_jalali_years + 226899;

        if ($this->month < 10) {
            $days_of_gregorain_years = $days_of_gregorain_years - intval(( ( $this->year + 621 ) / 4 ));
        } elseif (( ( 10 == $this->month ) && ( $this->day > 10 ) ) || ( $this->month > 10 )) {
            $days_of_gregorain_years = $days_of_gregorain_years - intval(( ( $this->year + 622 ) / 4 ));
        }

            $gregorian_month = ( $days_of_gregorain_years % 365 );

            $gregorian_year = intval($days_of_gregorain_years / 365) + 1;

            $this->config = include __DIR__.'/Gregorian.php';

        foreach ($this->config[ 'month_days_number' ] as $month => $value) {
            if ($gregorian_month < $value) {
                break;
            }

            $gregorian_month -= $value;
        }

          $gregorian_day = $gregorian_month;

          $gregorian_month = $month;

          $this->date_time->setDate($gregorian_year, $gregorian_month, $gregorian_day);


         return $this->date_time;

    }

    /**
   *convert jalali year to hijri year
 *
   * @since  Oct, 17 2015
   * @return object
   */
    public function jalaliToHijri($date_time)
    {

        $this->date_time = $date_time;

        $this->year = $this->date_time->format('Y');

        $this->month = $this->date_time->format('n');

        $this->day = $this->date_time->format('d');

        $this->temp_day = 0 ;

        $this->config = include __DIR__.'/Jalali.php';

        for ($i = 1; $i < $this->month; $i++) {
            $this->temp_day += $this->config['month_days_number'][$i];
        }

         $this->temp_day += $this->day;

         $this->leap = new Leap($this->year);

        if ($this->leap->get() && $this->month > 11) {
            $this->temp_day++;
        }

        $_year = ( ( ( ( ( $this->year - 1 ) * 365.2422 ) + $this->temp_day ) - 119) / 354.3670 ) + 1;

        $_year = explode('.', $_year);

        $this->year = $_year[0];

        $_month = $_year[1];

         $var_temp = '0.0';

        for ($i = strlen($_month); $i > 2; $i--) {
            $var_temp .= '0';
        }

         $var_temp .= '1';

        $_month = $_month * $var_temp ;

        $_month = ( $_month * 12 ) + 1;

        $_month = explode('.', $_month);

        $this->month = $_month[0];

        $_day = $_month[1];

        $var_temp = '0.0';

        for ($i = strlen($_day); $i > 2; $i--) {
            $var_temp .= '0' ;
        }

        $var_temp .= '1';

        $_day = $_day * $var_temp;

        $_day = ( $_day * 29.530 );

        $_day = explode('.', $_day);

        $this->day = $_day[0];

           $this->date_time->setDate($this->year, $this->month, $this->day);

           return $this->date_time;

    }

    /**
   *convert hijri year to jalali year
 *
   * @since  Oct, 17 2015
   * @return object
   */
    public function hijriToJalali($date_time)
    {

          $this->date_time = $date_time;

          $this->year = $this->date_time->format('Y');

          $this->month = $this->date_time->format('m');

          $this->day = $this->date_time->format('d');

          $days_of_year = 0;

          $this->config = include __DIR__.'/Hijri.php';

        foreach ($this->config[ 'month_days_number' ] as $month => $value) {
            if ($this->month > $month) {
                $days_of_year += $value;
            }
        }

          $days_of_year += $this->day;

          $days_of_leap_years =  intval(( ( $this->year - 1 ) / 3 ));

          $days_of_hijri_years = ( ( ( $this->year - 1 ) * 354 ) + $days_of_year + $days_of_leap_years );

          $days_of_jalali_years = $days_of_hijri_years + 179;

          $days_of_jalali_years = $days_of_jalali_years - intval(( ( $this->year - 43 ) / 4 ));

          $jalali_month = ( $days_of_jalali_years % 365 );

          $jalali_year = intval($days_of_jalali_years / 365) + 1;

          $this->config = include __DIR__.'/Jalali.php';

        foreach ($this->config[ 'month_days_number' ] as $month => $value) {
            if ($jalali_month < $value) {
                break;
            }

              $jalali_month -= $value;
        }

          $jalali_day = $jalali_month;

          $jalali_month = $month;

          $this->date_time->setDate($jalali_year, $jalali_month, $jalali_day);

         return $this->date_time;

    }

    /**
    * convert hijri year to gregorian year
   *
    * @since  Oct, 17 2015
    * @return object
    */
    public function hijriToGregorian($date_time)
    {

        $this->date_time = $date_time;

        $this->year = $this->date_time->format('Y');

        $this->month = $this->date_time->format('m');

        $this->day = $this->date_time->format('d');

        $days_of_year = 0;

        $this->config = include __DIR__.'/Hijri.php';

        foreach ($this->config[ 'month_days_number' ] as $month => $value) {
            if ($this->month > $month) {
                $days_of_year += $value;
            }
        }

        $days_of_year += $this->day;

        $days_of_leap_years =  intval(( ( $this->year - 1 ) / 3 ));

        $days_of_hijri_years = ( ( ( $this->year - 1 ) * 354 ) + $days_of_year + $days_of_leap_years );

        $days_of_gregorain_years = $days_of_hijri_years + 227078;

        $days_of_gregorain_years = $days_of_gregorain_years - intval(( ( $this->year + 578 ) / 4 ));

        $gregorian_month = ( $days_of_gregorain_years % 365 );

        $gregorian_year = intval($days_of_gregorain_years / 365) + 1;

        $this->config = include __DIR__.'/Gregorian.php';

        foreach ($this->config[ 'month_days_number' ] as $month => $value) {
            if ($gregorian_month < $value) {
                break;
            }

            $gregorian_month -= $value;
        }

        $gregorian_day = $gregorian_month;

        $gregorian_month = $month;

        $this->date_time->setDate($gregorian_year, $gregorian_month, $gregorian_day);

         return $this->date_time;

    }
}
