<?php

if (!function_exists('formatBytes')) {

    /**
     * Format bytes to up dimensions
     *
     * @param int $bytes
     * @param int $precision
     * @return string
     */
    function formatBytes($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        if ($bytes == 0) {
            return '0 B';
        }

        $pow = (int)floor(log($bytes) / log(1024));

        return round($bytes / pow(1024, $pow), $precision) . ' ' . $units[$pow];
    }

}

if (!function_exists('format_price')) {

    function format_price($price)
    {
        if (!is_numeric($price)) return 0;
        $decimal = 0;
        //if (is_real($price)) $decimal = 2;
        return number_format($price, $decimal, '.', ' ');
    }
}

if (!function_exists('asset_app')) {

    /**
     * Generate an asset path for app files.
     *
     * @param string $filename
     * @param bool $secure
     * @return string
     */
    function asset_app($filename, $secure = null)
    {
        return asset('storage/' . $filename, $secure);
    }
}

if (!function_exists('getLocales')) {

    function getLocales()
    {
        $result = [];
        foreach (config('app.locales') as $key => $item) {
            $result[] = [
                'code' => $key,
                'value' => $item
            ];
        }
        return $result;
    }
}
