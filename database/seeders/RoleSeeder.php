<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_super = Role::create(['name' => 'super']);
        $role_admin = Role::create(['name' => 'admin']);
        $role_adviser = Role::create(['name' => 'adviser']);
        $role_general = Role::create(['name' => 'general']);
        $role_seller = Role::create(['name' => 'seller']);
    }
}