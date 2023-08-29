<?php

class FileHelper {

    public static $file_units = array(
        'GB' => 'ГБ',
        'MB' => 'МБ',
        'KB' => 'КБ',
        'bytes' => 'байт'
    );

    /**
     * @param $size
     * @param string|null $unit
     * @see https://stackoverflow.com/questions/15188033/human-readable-file-size
     *
     * @return string
     */
    public static function humanFileSize($size, string $unit = null): string
    {
        if (( ! $unit && $size >= 1 << 30) || $unit === "GB") {
            return number_format($size / (1 << 30), 2)."&nbsp;ГБ" . self::$file_units['GB'];
        }
        if (( ! $unit && $size >= 1 << 20) || $unit === "MB") {
            return number_format($size / (1 << 20), 2)."&nbsp;" . self::$file_units['MB'];
        }
        if (( ! $unit && $size >= 1 << 10) || $unit === "KB") {
            return number_format($size / (1 << 10), 2)."&nbsp;" . self::$file_units['KB'];
        }
        return number_format($size)."&nbsp;" . self::$file_units['bytes'];
    }

    public static function sanitizeFilename(string $string)
    {
        $bad = ["<", ">", ":", '"', "/", "\\", "|", "?", "*"];
        $bad = array_merge($bad, array_map('chr', range(0,31)));
        return str_replace($bad, "", $string);
    }

}
