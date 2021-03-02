<?php

//namespace App\Helpers;
//namespace where is colated the class
//use Illuminate\Support\Facades\DB;

class FormatTime
{
    public static function LongTimeFilter($date)
    {
        if ($date == null) {
            return "No Date";
        }

        $start_date = date_create($date);;
        $since_start = $start_date->diff(new \DateTime(date("Y-m-d") . " " . date("H:i:s")));

        if ($since_start->y == 0) {
            if ($since_start->m == 0) {
                if ($since_start->d == 0) {
                    if ($since_start->h == 0) {
                        if ($since_start->i == 0) {
                            if ($since_start->s == 0) {
                                $result = $since_start->s . ' seconds';
                            } else {
                                if ($since_start->s == 1) {
                                    $result = $since_start->s . ' segund';
                                } else {
                                    $result = $since_start->s . ' seconds';
                                }
                            }
                        } else {
                            if ($since_start->i == 1) {
                                $result = $since_start->i . ' minute';
                            } else {
                                $result = $since_start->i . ' minutes';
                            }
                        }
                    } else {
                        if ($since_start->h == 1) {
                            $result = $since_start->h . ' hour';
                        } else {
                            $result = $since_start->h . ' hours';
                        }
                    }
                } else {
                    if ($since_start->d == 1) {
                        $result = $since_start->d . ' day';
                    } else {
                        $result = $since_start->d . ' days';
                    }
                }
            } else {
                if ($since_start->m == 1) {
                    $result = $since_start->m . ' month';
                } else {
                    $result = $since_start->m . ' months';
                }
            }
        } else {
            if ($since_start->y == 1) {
                $result = $since_start->y . ' year';
            } else {
                $result = $since_start->y . ' years';
            }
        }

        return "Ago ".$result;
    }
}
