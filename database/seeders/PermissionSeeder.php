<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $adminPermissions = [
            Permission::create(['name' => 'news.*']),
        ];

        $admin =  Role::create(['name'=>'admin']);

        $admin->givePermissionTo($adminPermissions);

        $superAdmin = User::factory()->create([
            'name' => 'AliZibaie',
            'email' => 'alizibaie1380@gmail.com',
            'password' => Hash::make('Ali1380$50505'),
        ]);
        $superAdmin->assignRole($admin);
    }
}
