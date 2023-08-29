<?php

namespace App\Helpers;

use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberUtil;

class PhoneHelper {

    public static function isValidPhoneNumber($number, string $defaultRegion = null): bool {

        // giggsey/libphonenumber-for-php
        $phoneUtil = PhoneNumberUtil::getInstance();

        try {
            $numberProto = $phoneUtil->parse( $number, $defaultRegion );
            return $phoneUtil->isValidNumber($numberProto);
        } catch ( NumberParseException $e ) {
            return false;
        }
    }

}
