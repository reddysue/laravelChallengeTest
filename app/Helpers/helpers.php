<?php

if (!function_exists('strTo24hrFormat')) {
    function strTo24hrFormat($value)
    {
        return date('Y-m-d H:i:s', strtotime($value));
    }
}