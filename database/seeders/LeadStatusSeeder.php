<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\LeadStatus;
use Carbon\Carbon;

class LeadStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('leads_status')->insert([
            [
                'status_name' => 'PENDIENTE',
                'active'      => true,
                'created_at'  => Carbon::now(),
                'created_by'  => null
            ],
            [
                'status_name' => 'NO CONTESTA',
                'active'       => true,
                'created_at'   => Carbon::now(),
                'created_by'   => null
            ],
            [
                'status_name' => 'CONFIRMARA',
                'active'      => true,
                'created_at'  => Carbon::now(),
                'created_by'  => null
            ],
            [
                'status_name' => 'NO INTERESADO/A',
                'active'      => true,
                'created_at'  => Carbon::now(),
                'created_by'  => null
            ],
            [
                'status_name' => 'PAGARÁ',
                'active'      => true,
                'created_at'  => Carbon::now(),
                'created_by'  => null
            ],
            [
                'status_name' => 'COMPETENCIA',
                'active'      => true,
                'created_at'  => Carbon::now(),
                'created_by'  => null
            ],
            [
                'status_name' => 'PAGADO',
                'active'      => true,
                'created_at'  => Carbon::now(),
                'created_by'  => null
            ],
            [
                'status_name' => 'VOLVER A LLAMAR',
                'active'      => true,
                'created_at'  => Carbon::now(),
                'created_by'  => null
            ],
        ]);
    }
}