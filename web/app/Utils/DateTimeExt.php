<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Utils;

use Illuminate\Support\Carbon;

/**
 * Description of DateTimeExt
 *
 * @author nguyenpt <nguyenpt@bisync.jp>
 */
class DateTimeExt {
    //-----------------------------------------------------
    // Constants
    //-----------------------------------------------------
    /** Date format */
    const DATE_FORMAT_1 = 'Y-m-d H:i:s';
    /** Date format */
    const DATE_FORMAT_2 = 'dd/mm/yy';
    /** Date format */
    const DATE_FORMAT_3 = 'd/m/Y';
    /** Date format */
    const DATE_FORMAT_4 = 'Y-m-d';
    /** Date format */
    const DATE_FORMAT_5 = 'd \t\h\g m\, Y';
    /** Date format */
    const DATE_FORMAT_6 = 'Y/m/d';
    /** Date format */
    const DATE_FORMAT_7 = 'Y/m/d H:i:s';
    /** Date format */
    const DATE_FORMAT_8 = 'H:i\, d \t\h\g m\, Y';
    /** Date format */
    const DATE_FORMAT_9 = 'YmdHis';
    /** Date format */
    const DATE_FORMAT_10 = 'Ymd';
    /** Date format */
    const DATE_FORMAT_11 = 'd/m/Y H:i';
    /** Date format */
    const DATE_FORMAT_12 = 'yy-mm-dd';
    /** Date format */
    const DATE_FORMAT_13 = 'm/Y';
    /** Date format */
    const DATE_FORMAT_14 = 'mm/yy';
    /** Date format */
    const DATE_FORMAT_15 = 'yy';
    /** Date format */
    const DATE_FORMAT_16 = 'ddmmyyyy';
    /** Date format */
    const DATE_FORMAT_17 = 'dd/MM/yyyy';
    /** Date format */
    const DATE_FORMAT_18 = 'Y.m.d';
    /** Date format */
    const DATE_FORMAT_19 = 'm/d/Y H:i:s';
    /** Date format for Widget */
    const DATE_FORMAT_WIDGET_1 = 'dd/mm/yyyy hh:ii';
    /** Date format for Widget */
    const DATE_FORMAT_WIDGET_2 = 'yyyy-mm-dd hh:ii:ss';
    /** Date format for Widget */
    const DATE_FORMAT_WIDGET_3 = 'dd/mm/yyyy';
    /** Date default value null */
    const DATE_DEFAULT_NULL = '0000-00-00';
    /** Date default value null */
    const DATE_DEFAULT_NULL_FULL = '0000-00-00 00:00:00';
    /** Date default value null */
    const DATE_FORMAT_3_NULL = '00/00/0000';
    /** Date default year value null */
    const DATE_DEFAULT_YEAR_NULL = '0000';
    /** Date format main */
    const DATE_FORMAT_VIEW = self::DATE_FORMAT_5;
    /** Date format backend */
    const DF_BACK_END_SHOW = self::DATE_FORMAT_3;
    /** Date format db */
    const DF_BACK_END_SAVE = self::DATE_FORMAT_4;
    /** Default timezone */
    const DEFAULT_TIMEZONE = 'Asia/Tokyo';

    /**
     * Get value of current date time
     * @param String $format Date time format
     * @return Date time string (default is DATE_FORMAT_1 - 'Y-m-d H:i:s')
     */
    public static function getCurrentDateTime($format = self::DATE_FORMAT_1) {
//        date_default_timezone_set(self::DEFAULT_TIMEZONE);
        //        return date($format);
        $carbon = new Carbon();
        $carbon->setTimezone(self::DEFAULT_TIMEZONE);
        return $carbon->now()->format($format);
    }

    /**
     * Get value of current date time (of real system)
     * @return Date time string (default is DATE_FORMAT_1 - 'Y-m-d H:i:s')
     */
    public static function getCurrentDateTimeSystem() {
        date_default_timezone_set(self::DEFAULT_TIMEZONE);

        return date(self::DATE_FORMAT_1);
    }

    /**
     * Format datetime
     * @param String $date datetime inpput
     * @param String $format Date time format
     * @return Date time string
     */
    public static function formatDateTime($date, $format) {
        $date = new Carbon($date);
        $date = $date->format($format);
        return $date;
    }

    /**
     * Add day
     * @param String $date datetime inpput
     * @param int $number number days want to add
     * @param String $format Date time format
     * @return Date time string
     */
    public static function addDays($date, $number, $format) {
        return Carbon::parse($date)->addDays($number)->format($format);
    }

    /**
     * Sub day
     * @param String $date datetime inpput
     * @param int $number number days want to sub
     * @param String $format Date time format
     * @return Date time string
     */
    public static function subDays($date, $number, $format) {
        return Carbon::parse($date)->subDays($number)->format($format);
    }
}
