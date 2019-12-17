<?php

if (! function_exists('setting')) {
    /**
     * Get / set the specified setting value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param  array|string  $key
     * @param  mixed  $default
     * @return mixed|\MuetzeOfficial\Settings\Setting
     */
    function setting($key = null, $default = null)
    {
        if (is_null($key)) {
            return app('setting');
        }

        if (is_array($key)) {
            return app('setting')->set($key);
        }

        return app('setting')->get($key, $default);
    }
}

if (! function_exists('setting_exists')) {
    /**
     * Check the specified setting exits.
     *
     * @param  string  $key
     * @return mixed
     */
    function setting_exists($key)
    {
        return app('setting')->exists($key);
    }
}
