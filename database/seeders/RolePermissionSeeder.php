<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$role_super = Role::create(['name' => 'super']);
        $role_admin = Role::create([
            'key' => 'admin',
            'name' => 'Administrador'
        ]);
        $role_marketing = Role::create([
            'key' => 'marketing',
            'name' => 'Marketing'
        ]);
        $role_seller = Role::create([
            'key' => 'seller',
            'name' => 'Vendedor'
        ]);

        Permission::create([
            'path' => 'admin.users.index',
            'name' => 'admin.users.index'
        ])->syncRoles([$role_admin]);

        Permission::create([
            'path' => 'admin.users.create',
            'name' => 'admin.users.create'
        ])->syncRoles([$role_admin, $role_marketing]);

        Permission::create([
            'path' => 'admin.users.edit',
            'name' => 'admin.users.edit'
        ])->syncRoles([$role_admin]);

        Permission::create([
            'path' => 'admin.users.destroy',
            'name' => 'admin.users.destroy'
        ])->syncRoles([$role_admin]);
    }
}