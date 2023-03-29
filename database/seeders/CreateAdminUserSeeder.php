<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		 $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
        ];
       
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
		
        //Admin Seeder
        $user = User::create([
            'name' => 'Admin', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'type' => 1
        ]);
      
        $role = Role::create(['name' => 'Admin']);
       
        $permissions = Permission::pluck('id','id')->all();
     
        $role->syncPermissions($permissions);
       
        $user->assignRole([$role->id]);
		
		$users = [
            [
               'name'=>'Moderator User',
               'email'=>'moderator@gmail.com',
               'type'=> 2,
               'password'=> bcrypt('12345678'),
            ],
            [
               'name'=>'User',
               'email'=>'user@gmail.com',
               'type'=>0,
               'password'=> bcrypt('12345678'),
            ],
        ];
		foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}