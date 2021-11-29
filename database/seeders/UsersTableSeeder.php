<?php

namespace Database\Seeders;
use App\Admin;
use App\Roles;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();

        $adminRoles = Roles::where('name','admin')->first();
        $authorRoles = Roles::where('name','author')->first();
        $userRoles = Roles::where('name','user')->first();

        $admin = Admin::create([
        	'admin_name' => 'congadmin',
        	'admin_email' => 'congadmin@gmail.com',
        	'admin_phone' => '123456789',
        	'admin_password' => md5('123456')
        ]);

        $author = Admin::create([
        	'admin_name' => 'congauthor',
        	'admin_email' => 'congauthor@gmail.com',
        	'admin_phone' => '123456789',
        	'admin_password' => md5('123456')
        ]);

        $user = Admin::create([
        	'admin_name' => 'conguser',
        	'admin_email' => 'conguser@gmail.com',
        	'admin_phone' => '123456789',
        	'admin_password' => md5('123456')
        ]);

        $admin->roles()->attach($adminRoles);
        $author->roles()->attach($authorRoles);
        $user->roles()->attach($userRoles);

    }
}
