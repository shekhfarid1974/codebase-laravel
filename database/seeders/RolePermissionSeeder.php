<?php
// database/seeders/RolePermissionSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Create permissions
        $permissions = [
            // User management permissions
            'view users', 'create users', 'edit users', 'delete users',

            // Profile permissions
            'view profile', 'edit profile',

            // Dashboard permissions
            'view dashboard',

            // CRM permissions
            'view crm', 'create crm', 'edit crm', 'delete crm',

            // Report permissions
            'view reports', 'create reports', 'edit reports', 'delete reports',

            // Ticket permissions
            'view tickets', 'create tickets', 'edit tickets', 'delete tickets',

            // Lead permissions
            'view leads', 'create leads', 'edit leads', 'delete leads',

            // FAQ permissions
            'view faqs', 'create faqs', 'edit faqs', 'delete faqs',

            // Product permissions
            'view products', 'create products', 'edit products', 'delete products',

            // SMS permissions
            'view sms', 'create sms', 'edit sms', 'delete sms',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $supervisorRole = Role::create(['name' => 'supervisor']);
        $agentRole = Role::create(['name' => 'agent']);

        // Admin gets all permissions
        $adminRole->givePermissionTo(Permission::all());

        // Supervisor gets specific permissions (you can customize these)
        $supervisorRole->givePermissionTo([
            'view dashboard',
            'view profile',
            'edit profile',
            'view crm',
            'create crm',
            'edit crm',
            'view reports',
            'view tickets',
            'create tickets',
            'edit tickets',
            'view leads',
            'create leads',
            'edit leads',
            'view faqs',
            'create faqs',
            'edit faqs',
            'view products',
            'create products',
            'edit products',
            'view sms',
        ]);

        // Agent gets basic permissions
        $agentRole->givePermissionTo([
            'view dashboard',
            'view profile',
            'edit profile',
            'view crm',
            'create crm',
            'view tickets',
            'create tickets',
            'view leads',
        ]);

        // Create default admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'status' => true,
            'username' => 'admin',
            'active' => true,
        ]);
        $admin->assignRole('admin');
    }
}
