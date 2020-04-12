<?php

use Illuminate\Database\Seeder;

class TableSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'key' => 'site_title',
                'value' => 'Skeleton'
            ],
            [
                'key' => 'site_description',
                'value' => 'Laravel Stisla Skeleton'
            ],
            [
                'key' => 'site_logo',
                'value' => 'logo.png'
            ],
            [
                'key' => 'site_favicon',
                'value' => 'favicon.png'
            ],
            [
                'key' => 'site_analytics_id',
                'value' => 'NOT_SET'
            ],
            [
                'key' => 'site_db_last_backup',
                'value' => 'NOT_SET'
            ],
        ];

        foreach ($data as $setting) {
            \App\Models\Setting::create($setting);
        }
    }
}
