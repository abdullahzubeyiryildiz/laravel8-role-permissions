<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'permission.index',
            'permission.create',
            'permission.edit',
            'permission.destroy',
            'role.index',
            'role.create',
            'role.edit',
            'role.destroy',
            'blog.index',
            'blog.create',
            'blog.edit',
            'blog.destroy'
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
