<?php

namespace MuetzeOfficial\Settings\Console;

use MuetzeOfficial\Settings\SettingFacade as Setting;
use Illuminate\Console\Command;

class SettingSetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setting:set
                            {key : Setting key}
                            {value : Setting value}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set an setting.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Setting::set($this->argument('key'), $this->argument('value'));

        $this->info('Setting set.');
    }
}
