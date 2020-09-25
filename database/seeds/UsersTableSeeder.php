<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('role_user')->truncate();
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin user',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        $author = User::create([
            'name' => 'Author user',
            'email' => 'author@author.com',
            'password' => Hash::make('password'),
        ]);

        $user = User::create([
            'name' => 'User user',
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
}
