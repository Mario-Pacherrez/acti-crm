<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Channel;
use Carbon\Carbon;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('channels')->insert([
            [
                'channel_name' => 'LEADS',
                'active'       => true,
                'created_at'   => Carbon::now(),
                'created_by'   => null
            ],
            [
                'channel_name' => 'WEB',
                'active'       => true,
                'created_at'   => Carbon::now(),
                'created_by'   => null
            ],
            [
                'channel_name' => 'MENSAJES',
                'active'       => true,
                'created_at'   => Carbon::now(),
                'created_by'   => null
            ],
            [
                'channel_name' => 'OTROS',
                'active'       => true,
                'created_at'   => Carbon::now(),
                'created_by'   => null
            ],
        ]);
    }
}