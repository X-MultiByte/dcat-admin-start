<?php

namespace Dcat\Admin\Models;

use Illuminate\Database\Seeder;

class AdminTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createdAt = date('Y-m-d H:i:s');
        
        // create a user.
        Administrator::truncate();
        Administrator::create([
            'username'   => 'admin',
            'password'   => bcrypt('admin'),
            'name'       => 'Administrator',
            'status'     => 1,
            'created_at' => $createdAt,
        ]);
        
        // create a role.
        Role::truncate();
        Role::create([
            'name'       => 'Administrator',
            'slug'       => Role::ADMINISTRATOR,
            'created_at' => $createdAt,
        ]);
        
        // add role to user.
        Administrator::first()->roles()->save(Role::first());
        
        //create a permission
        Permission::truncate();
        Permission::insert([
            [
                'id'          => 1,
                'name'        => 'Auth management',
                'slug'        => 'auth-management',
                'http_method' => '',
                'http_path'   => '',
                'parent_id'   => 0,
                'order'       => 1,
                'created_at'  => $createdAt,
            ],
            [
                'id'          => 2,
                'name'        => 'Users',
                'slug'        => 'users',
                'http_method' => '',
                'http_path'   => '/auth/users*',
                'parent_id'   => 1,
                'order'       => 2,
                'created_at'  => $createdAt,
            ],
            [
                'id'          => 3,
                'name'        => 'Roles',
                'slug'        => 'roles',
                'http_method' => '',
                'http_path'   => '/auth/roles*',
                'parent_id'   => 1,
                'order'       => 3,
                'created_at'  => $createdAt,
            ],
            [
                'id'          => 4,
                'name'        => 'Permissions',
                'slug'        => 'permissions',
                'http_method' => '',
                'http_path'   => '/auth/permissions*',
                'parent_id'   => 1,
                'order'       => 4,
                'created_at'  => $createdAt,
            ],
            [
                'id'          => 5,
                'name'        => 'Menu',
                'slug'        => 'menu',
                'http_method' => '',
                'http_path'   => '/auth/menu*',
                'parent_id'   => 1,
                'order'       => 5,
                'created_at'  => $createdAt,
            ],
            [
                'id'          => 6,
                'name'        => 'Extension',
                'slug'        => 'extension',
                'http_method' => '',
                'http_path'   => '/auth/extensions*',
                'parent_id'   => 1,
                'order'       => 6,
                'created_at'  => $createdAt,
            ],
        ]);
        
        //        Role::first()->permissions()->save(Permission::first());
        
        // add default menus.
        Menu::truncate();
        Menu::insert([
            [
                'parent_id'  => 0,
                'order'      => 1,
                'title'      => 'Dashboard',
                'icon'       => 'fa fa-dashboard',
                'uri'        => '/',
                'created_at' => $createdAt,
            ],
            [
                'parent_id'  => 0,
                'order'      => 2,
                'title'      => 'Extensions',
                'icon'       => 'feather icon-layers',
                'uri'        => 'auth/extensions',
                'created_at' => $createdAt,
            ],
            [
                'parent_id'  => 0,
                'order'      => 3,
                'title'      => 'Account',
                'icon'       => 'feather icon-users',
                'uri'        => '',
                'created_at' => $createdAt,
            ],
            [
                'parent_id'  => 3,
                'order'      => 4,
                'title'      => 'Users',
                'icon'       => '',
                'uri'        => 'auth/users',
                'created_at' => $createdAt,
            ],
            [
                'parent_id'  => 3,
                'order'      => 5,
                'title'      => 'Roles',
                'icon'       => '',
                'uri'        => 'auth/roles',
                'created_at' => $createdAt,
            ],
            [
                'parent_id'  => 3,
                'order'      => 6,
                'title'      => 'Permission',
                'icon'       => '',
                'uri'        => 'auth/permissions',
                'created_at' => $createdAt,
            ],
            [
                'parent_id'  => 0,
                'order'      => 7,
                'title'      => 'Menu',
                'icon'       => 'fa fa-list-ul',
                'uri'        => 'auth/menu',
                'created_at' => $createdAt,
            ],
        ]);
        
        ( new Menu() )->flushCache();
    }
}
