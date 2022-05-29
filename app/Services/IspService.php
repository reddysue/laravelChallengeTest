<?php

namespace App\Services;

use App\Services\InternetServiceProvider\Mpt;
use App\Services\InternetServiceProvider\Ooredoo;

class IspService
{
    public function getMptAmount($month)
    {
        $mpt = new Mpt();
        $mpt->setMonth($month ?: 1);
        return $mpt->calculateTotalAmount();
    }

    public function getOoredooAmount($month)
    {
        $ooredoo = new Ooredoo();
        $ooredoo->setMonth($month ?: 1);
        return $ooredoo->calculateTotalAmount();
    }
}