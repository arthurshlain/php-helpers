<?php

namespace App\Helpers;

use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberUtil;

class PhoneHelper {

    public static function isValidPhoneNumber($number, string $region = 'RU'): bool {

        // giggsey/libphonenumber-for-php
        $phoneUtil = PhoneNumberUtil::getInstance();

        try {
            $russianNumberProto = $phoneUtil->parse( $number, $region );
            return $phoneUtil->isValidNumber($russianNumberProto);
        } catch ( NumberParseException $e ) {
            return false;
        }
    }

}
