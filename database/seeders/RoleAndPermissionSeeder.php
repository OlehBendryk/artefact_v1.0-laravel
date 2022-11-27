<?php

namespace Database\Seeders;

use App\Models\Moderator;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create articles']);
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        // create roles and assign created permissions

        Role::create(['name' => 'journalist'])->givePermissionTo(['create articles','edit articles']);

        Role::create(['name' => 'admin'])
            ->givePermissionTo(['delete articles', 'publish articles', 'unpublish articles']);

        Role::create(['name' => 'superadmin'])->givePermissionTo(Permission::all());

        $role = Role::where('name', 'superadmin')->first();
        $user = Moderator::where('email', 'admin@admin.com')->first();
        $user->assignRole($role);
    }
}
