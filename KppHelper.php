<?php

namespace App\Helpers;

class KppHelper {

    /**
     * Проверяет валидность КПП
     *
     * @param $kpp
     *
     * @return bool
     */
    public static function isValidKpp($kpp): bool {

        $kpp = (string) $kpp;

        if (empty($kpp)) {
            $_ENV['kpp_error_no'] = 1;
            $_ENV['kpp_error'] = 'КПП пуст.';
            return false;
        }

        if (strlen($kpp) !== 9) {
            $_ENV['kpp_error_no'] = 2;
            $_ENV['kpp_error'] = 'КПП может состоять только из 9 знаков.';
            return false;
        }

        if (!preg_match('/^[0-9]{4}[0-9A-Z]{2}[0-9]{3}$/', $kpp)) {
            $_ENV['kpp_error_no'] = 3;
            $_ENV['kpp_error'] = 'Неправильный формат КПП.';
            return false;
        }

        return true;
    }

}
