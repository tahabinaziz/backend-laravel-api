<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions for company crud
        $viewUser = 'view user';
        $addUser = 'add user';
        $editUser = 'edit user';
        $deleteUser = 'delete user';
        $approveUser = 'approve user';
        $suspendUser = 'suspend user';
        
        $viewCompany = 'view company';
        $addCompany = 'add company';
        $editCompany = 'edit company';
        $deleteCompany = 'delete company';

        $viewEmployee = 'view employee';
        $addEmployee = 'add employee';
        $editEmployee = 'edit employee';
        $deleteEmployee = 'delete employee';

        $shareData = 'share data';

        Permission::create(['name' => $addUser]);
        Permission::create(['name' => $editUser]);
        Permission::create(['name' => $deleteUser]);
        Permission::create(['name' => $viewUser]);

        Permission::create(['name' => $addCompany]);
        Permission::create(['name' => $editCompany]);
        Permission::create(['name' => $deleteCompany]);
        Permission::create(['name' => $viewCompany]);
        
        Permission::create(['name' => $addEmployee]);
        Permission::create(['name' => $editEmployee]);
        Permission::create(['name' => $deleteEmployee]);
        Permission::create(['name' => $viewEmployee]);

        Permission::create(['name' => $shareData]);

        //  define roles available
        $superAdmin = 'super-admin';
        $proAdmin = 'pro-admin';
        $proData = 'pro-data';
        $standardAdmin = 'standard-admin';
        $standardData = 'standard-data';


        //pro account is to share and access other companies data and update data.
        // standard account is for local access data with in company.
        
        
        Role::create(['name' => $superAdmin])->givePermissionTo(Permission::all());
        Role::create(['name' => $proAdmin])->givePermissionTo([
            $editUser,
            $deleteUser,
            $viewUser,
            $addEmployee,
            $editEmployee,
            $deleteEmployee,
            $viewEmployee,
            $editCompany,
            $viewCompany,
            $shareData
        ]);

        Role::create(['name' => $proData])->givePermissionTo([
            $viewUser,
            $viewEmployee,
            $viewCompany
        ]);

        Role::create(['name' => $standardAdmin])->givePermissionTo([
            $addUser,
            $editUser,
            $deleteUser,
            $viewUser,
            $addEmployee,
            $editEmployee,
            $deleteEmployee,
            $viewEmployee,
            $editCompany,
            $viewCompany,
            $shareData
        ]);

        Role::create(['name' => $standardData])->givePermissionTo([
            $viewUser,
            $viewEmployee,
            $viewCompany
        ]);

    }
}
