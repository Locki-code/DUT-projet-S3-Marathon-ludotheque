<?php
namespace App\Services;


use Carbon\Carbon;
use Carbon\Factory;

class DateService {

    static function diff(string $dt) {
        return Carbon::parse($dt)->locale('fr_FR')->diffForHumans();
    }
    static function dateJour(string $dt) {
        $frenchDateFactory = new Factory(['locale' => 'fr_FR', 'timezone' => 'Europe/Paris',]);
        return $frenchDateFactory->make(Carbon::parse($dt))->isoFormat('lll');
        //return $frenchDateFactory->make(Carbon::parse($dt))->format('l j F Y');
    }
}
