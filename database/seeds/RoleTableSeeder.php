<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// app()[\Spatie\Permission\PermissionRegister::class]->forgetCachedPermissions();
        $role = Role::create(['name' => 'admin']);
    	$role = Role::create(['name' => 'lecturer']);
    	$role = Role::create(['name' => 'student']);
    }
}
