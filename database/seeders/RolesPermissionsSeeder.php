<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $abilities = [
            'read',
            'create',
            'delete',
            'edit'
        ];

        $permissions_by_role = [
            'super admin' => [
                'user management',
                'course management',
                'category management',
                'module management',
                'quiz management',
                'certificate management',
                'report management'
            ],
            'editor' => [
                'course management',
                'category management',
                'module management',
            ],
            'supervisor' => [
                'course management',
                'category management',
                'module management',
            ],
            'company admin' => [
                'course management',
                'certificate management',
            ],
            'employee' => [
                'course management',
            ]

        ];

        foreach ($permissions_by_role['super admin'] as $permission) {
            foreach ($abilities as $ability) {
                Permission::create(['name' => $ability . ' ' . $permission]);
            }
        }

        foreach ($permissions_by_role as $role => $permissions) {
            $full_permissions_list = [];
            foreach ($abilities as $ability) {
                foreach ($permissions as $permission) {
                    $full_permissions_list[] = $ability . ' ' . $permission;
                }
            }
            Role::create(['name' => $role])->syncPermissions($full_permissions_list);
        }

        User::find(1)->assignRole('super admin');
        User::find(2)->assignRole('company admin');

        $users = User::query()->whereNotIn('id', [1, 2])->get();
        foreach ($users as $user) {
            $user->assignRole(array_rand(['editor', 'supervisor', 'company_admin', 'employee']));
        }
    }
}
