<?php

class Calculations
{
    public static function calculateDeadline($date, $rates) {
        $date = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        $calculatedInterval = $rates * 15;
        $dateInterval = new DateInterval('P' . $calculatedInterval . 'D');
        $date->add($dateInterval);
        return $date;
    }
}