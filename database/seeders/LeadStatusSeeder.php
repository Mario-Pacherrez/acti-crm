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
                'status_name' => 'Pendiente',
                'active'      => true,
                'created_at'  => Carbon::now(),
                'created_by'  => null
            ],
            [
                'status_name' => 'No Contesta',
                'active'       => true,
                'created_at'   => Carbon::now(),
                'created_by'   => null
            ],
            [
                'status_name' => 'Confirmara',
                'active'      => true,
                'created_at'  => Carbon::now(),
                'created_by'  => null
            ],
            [
                'status_name' => 'No Interesado/a',
                'active'      => true,
                'created_at'  => Carbon::now(),
                'created_by'  => null
            ],
            [
                'status_name' => 'Pagará',
                'active'      => true,
                'created_at'  => Carbon::now(),
                'created_by'  => null
            ],
            [
                'status_name' => 'Competencia',
                'active'      => true,
                'created_at'  => Carbon::now(),
                'created_by'  => null
            ],
            [
                'status_name' => 'Pagado',
                'active'      => true,
                'created_at'  => Carbon::now(),
                'created_by'  => null
            ],
            [
                'status_name' => 'Volver a llamar',
                'active'      => true,
                'created_at'  => Carbon::now(),
                'created_by'  => null
            ],
        ]);
    }
}