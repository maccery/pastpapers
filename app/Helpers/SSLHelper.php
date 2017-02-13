<?php

if (!function_exists('secure_asset_production')) {

    /**
     * If app environment is production, use SSL otherwise don't
     *§
     * @param url
     * @return
     */
    function secure_asset_production($url)
    {
        if (env('APP_ENV') == 'production')
        {
            return secure_asset($url);
        }

        return asset($url);
    }
}
