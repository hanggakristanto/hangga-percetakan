<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'admin_title'   => 'Sofiduta — Percetakan No. 1 di Indonesiata',
            'admin_footer'  => 'Sofiduta — Percetakan No. 1 di Indonesiata',
            'site_title'    => 'Sofiduta — Percetakan No. 1 di Indonesiata',
            'site_footer'   => 'Sofiduta — Percetakan No. 1 di Indonesiata',
            'email_recived' => 'youremail@gmail.com',
            'city'          => 'logo.png',
            'keywords'      => 'Sofiduta',
            'description'   => 'Sofiduta — Percetakan No. 1 di Indonesiata'
        ]);
    }
}
