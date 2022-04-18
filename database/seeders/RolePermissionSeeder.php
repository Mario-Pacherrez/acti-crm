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

        $default_role_1 = Role::create([
            'key' => 'role_1',
            'name' => 'Por Asignar'
        ]);

        // Admin
        /*Permission::create([
            'path' => 'dashboard',
            'name' => 'dashboard'
        ])->syncRoles([$role_admin]);*/

        Permission::create([
            'path' => 'admin.home',
            'name' => 'admin.home'
        ])->syncRoles([$role_admin]);

        Permission::create([
            'path' => 'admin.users.index',
            'name' => 'admin.users.index'
        ])->syncRoles([$role_admin]);

        Permission::create([
            'path' => 'admin.users.create',
            'name' => 'admin.users.create'
        ])->syncRoles([$role_admin]);

        Permission::create([
            'path' => 'admin.users.show',
            'name' => 'admin.users.show'
        ])->syncRoles([$role_admin]);

        Permission::create([
            'path' => 'admin.users.edit',
            'name' => 'admin.users.edit'
        ])->syncRoles([$role_admin]);

        Permission::create([
            'path' => 'admin.users.update',
            'name' => 'admin.users.update'
        ])->syncRoles([$role_admin]);

        Permission::create([
            'path' => 'admin.users.destroy',
            'name' => 'admin.users.destroy'
        ])->syncRoles([$role_admin]);

        // ADMIN - LEADS
        Permission::create([
            'path' => 'admin.leads.index',
            'name' => 'admin.leads.index'
        ])->syncRoles([$role_admin, $role_marketing]);

        Permission::create([
            'path' => 'admin.leads.create',
            'name' => 'admin.leads.create'
        ])->syncRoles([$role_admin, $role_marketing]);

        Permission::create([
            'path' => 'admin.leads.show',
            'name' => 'admin.leads.show'
        ])->syncRoles([$role_admin, $role_marketing]);

        Permission::create([
            'path' => 'admin.leads.edit',
            'name' => 'admin.leads.edit'
        ])->syncRoles([$role_admin, $role_marketing]);

        Permission::create([
            'path' => 'admin.leads.update',
            'name' => 'admin.leads.update'
        ])->syncRoles([$role_admin, $role_marketing]);

        Permission::create([
            'path' => 'admin.leads.destroy',
            'name' => 'admin.leads.destroy'
        ])->syncRoles([$role_admin, $role_marketing]);


        // ADMIN - SALES
        Permission::create([
            'path' => 'admin.sales.index',
            'name' => 'admin.sales.index'
        ])->syncRoles([$role_admin, $role_marketing]);

        Permission::create([
            'path' => 'admin.sales.create',
            'name' => 'admin.sales.create'
        ])->syncRoles([$role_admin, $role_marketing]);

        Permission::create([
            'path' => 'admin.sales.show',
            'name' => 'admin.sales.show'
        ])->syncRoles([$role_admin, $role_marketing]);

        Permission::create([
            'path' => 'admin.sales.edit',
            'name' => 'admin.sales.edit'
        ])->syncRoles([$role_admin, $role_marketing]);

        Permission::create([
            'path' => 'admin.sales.update',
            'name' => 'admin.sales.update'
        ])->syncRoles([$role_admin, $role_marketing]);

        Permission::create([
            'path' => 'admin.sales.destroy',
            'name' => 'admin.sales.destroy'
        ])->syncRoles([$role_admin, $role_marketing]);



        // SELLER, MARKETING
        Permission::create([
            'path' => 'user.home',
            'name' => 'user.home'
        ])->syncRoles([$role_admin, $role_marketing, $role_seller]); //

        Permission::create([
            'path' => 'leads.index',
            'name' => 'leads.index'
        ])->syncRoles([$role_admin, $role_marketing, $role_seller]);

        Permission::create([
            'path' => 'leads.create',
            'name' => 'leads.create'
        ])->syncRoles([$role_admin, $role_marketing, $role_seller]);

        Permission::create([
            'path' => 'leads.show',
            'name' => 'leads.show'
        ])->syncRoles([$role_admin, $role_marketing, $role_seller]);

        Permission::create([
            'path' => 'leads.edit',
            'name' => 'leads.edit'
        ])->syncRoles([$role_admin, $role_marketing, $role_seller]);

        Permission::create([
            'path' => 'leads.update',
            'name' => 'leads.update'
        ])->syncRoles([$role_admin, $role_marketing, $role_seller]);

        Permission::create([
            'path' => 'leads.destroy',
            'name' => 'leads.destroy'
        ])->syncRoles([$role_admin, $role_marketing, $role_seller]);


        // MY LEADS
        Permission::create([
            'path' => 'myleads.index',
            'name' => 'myleads.index'
        ])->syncRoles([$role_admin, $role_marketing, $role_seller]);

        Permission::create([
            'path' => 'myleads.create',
            'name' => 'myleads.create'
        ])->syncRoles([$role_admin, $role_marketing, $role_seller]);

        Permission::create([
            'path' => 'myleads.show',
            'name' => 'myleads.show'
        ])->syncRoles([$role_admin, $role_marketing, $role_seller]);

        Permission::create([
            'path' => 'myleads.edit',
            'name' => 'myleads.edit'
        ])->syncRoles([$role_admin, $role_marketing, $role_seller]);

        Permission::create([
            'path' => 'myleads.update',
            'name' => 'myleads.update'
        ])->syncRoles([$role_admin, $role_marketing, $role_seller]);

        Permission::create([
            'path' => 'myleads.destroy',
            'name' => 'myleads.destroy'
        ])->syncRoles([$role_admin, $role_marketing, $role_seller]);

        /*
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
        ])->syncRoles([$role_admin]);*/
    }
}