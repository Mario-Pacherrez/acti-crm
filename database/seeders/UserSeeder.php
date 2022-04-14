<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            //'user_type' => 'admin',
            'nickname' => 'mpacherrez',
            'name'       => 'Mario',
            'lastname'   => 'Pacherrez Changana',
            'email'      => 'mariopacherrez@gmail.com',
            'password'   => Hash::make('admin'),
        ])->assignRole('Administrador');

        User::create([
            'user_type' => 'system',
            'nickname'  => '',
            'name'      => 'Por',
            'lastname'  => 'Asignar',
            'email'     => 'system1@gmail.com',
            'password'  => '',
        ])->assignRole('Vendedor');
    }
}