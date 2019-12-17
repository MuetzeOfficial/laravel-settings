<?php

namespace MuetzeOfficial\Settings;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $primaryKey = 'key';
    protected $fillable   = ['key', 'value'];
    public $incrementing  = false;
    public $timestamps    = false;

    /**
     * Determine if the given setting value exists.
     *
     * @param  string  $key
     * @return bool
     */
    public function exists($key)
    {
        return self::where('key', $key)->exists();
    }

    /**
     * Get the specified setting value.
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        if ($setting = self::where('key', $key)->first()) {
            return $setting->value;
        }

        return $default;
    }

    /**
     * Set a given setting value.
     *
     * @param  array|string  $key
     * @param  mixed   $value
     * @return bool
     */
    public function set($key, $value = null)
    {
        $keys = is_array($key) ? $key : [$key => $value];

        foreach ($keys as $key => $value) {
            self::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        return true;
    }

    /**
     * Remove/delete the specified setting value.
     *
     * @param  string  $key
     * @return bool
     */
    public function remove($key)
    {
        return (bool) self::where('key', $key)->delete();
    }
}
