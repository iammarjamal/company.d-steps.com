<?php

namespace Database\Seeders;

use App\Enums\Role as RoleEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Enums\Permission as PermissionEnum;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (RoleEnum::cases() as $role) {
            Role::firstOrCreate(['name' => $role->value]);
        }

        foreach (PermissionEnum::cases() as $permission){
            Permission::firstOrCreate(['name' => $permission->value]);
        }

        $adminRole = Role::findByName(RoleEnum::Admin->value);
        $adminRole->givePermissionTo(PermissionEnum::cases());

        $hrRole = Role::findByName(RoleEnum::HR->value);
        $hrRole->givePermissionTo([PermissionEnum::DashboardAccess
            , PermissionEnum::ManageNotifications
            , PermissionEnum::ManageAdvancePayments
            , PermissionEnum::ManageVacations
        ]);

        $userRole = Role::findByName(RoleEnum::User->value);
        $userRole->givePermissionTo([PermissionEnum::DashboardAccess , PermissionEnum::ManageNotifications]);
    }
}
