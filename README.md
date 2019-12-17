This is a Fork of [Laravel Options](https://github.com/appstract/laravel-options) with Settings instead of options.


##### Install  
`MuetzeOfficial/laravel-settings`

##### Publish
`php artisan vendor:publish --provider="MuetzeOfficial\Settings\SettingsServiceProvider"`

##### Migrate
`php artisan migrate`


#### Usage
With the setting() helper, we can get and set options:
```
// Get setting
setting('someKey');

// Set setting
setting(['someKey' => 'someValue']);

// Check the option exists
setting_exists('someKey');
```

If you want to check if an option exists, you can use the facade:
```
use Setting;

$check = Setting::exists('someKey');
```
### Blade
```
@setting('someKey')
```
### Console
It is also possible to set options within the console:
```
php artisan option:set {someKey} {someValue}
```
