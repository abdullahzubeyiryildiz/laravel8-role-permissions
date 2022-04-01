<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        User::factory(10)
            ->create();

            $user = User::create([
                'name' => 'Abdullah Yıldız',
                'email' => 'pratikyazilimci@gmail.com',
                'password' => bcrypt('123456')
            ]);

            $role = Role::create(['name' => 'Admin']);

            $permissions = Permission::pluck('id','id')->all();

            $role->syncPermissions($permissions);

            $user->assignRole([$role->id]);
    }
}
