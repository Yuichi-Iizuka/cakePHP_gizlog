<?php

namespace App\Model\Validation;

use Cake\Validation\Validation;

class CustomValidation extends Validation {
    
    public static function validateUsername($username) {
        return stripos($username, 'admin') !== 0 ? true : false;
    }
}