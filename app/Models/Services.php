<?php

namespace App\Models;

class Services
{
    public function getFromURI($var) {
        if (isset($_GET[$var])) {
            return $_GET[$var];
        } else {
            return false;
        }
    }
}
