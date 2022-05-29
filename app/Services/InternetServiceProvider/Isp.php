<?php

namespace App\Services\InternetServiceProvider;

class Isp
{
    protected $month = 0;
    
    public function setMonth(int $month)
    {
        $this->month = $month;
    }
    
    public function calculateTotalAmount()
    {
        return $this->month * $this->monthlyFees;
    }
}