<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    private $permissions = [
        'product-list',
        'product-create',
        'product-edit',
        'product-delete'
    ];
    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        $user = User::create([
            'name' => 'Akshay',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);

        $roles = ['Admin', 'User'];

        foreach ($roles as $roleName) {
            // Create and assign the role to the $role variable
            $role = Role::create(['name' => $roleName]);

            // Retrieve permission IDs
            $permissions = Permission::pluck('id')->all();

            // Sync permissions to the role
            $role->syncPermissions($permissions);

            // Assign the role to the user
            $user->assignRole([$role->id]);
        }
    }
}
