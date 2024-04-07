<?php

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedRolesAndPermissionsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         // clear cache 
         app()['cache']->forget('spatie.permission.cache');
 
         // Create permissions first
        Permission::create(['name' => 'manage_tables']);
        Permission::create(['name' => 'manage_users']);
        Permission::create(['name' => 'manage_parametres']);
        // Permission::create(['name' => 'manage_agents']);
        // Permission::create(['name' => 'manage_enquetes']);
        // Permission::create(['name' => 'manage_fiches']);
 

         // Create a webmaster role and give permissions
        $founder = Role::create(['name' => 'Admin']);
        //$founder->givePermissionTo('manage_contents');
        $founder->givePermissionTo('manage_tables');
        $founder->givePermissionTo('manage_users');
        $founder->givePermissionTo('manage_parametres');


         // Create an admin role and give permissions
        $maintainer = Role::create(['name' => 'Editor']);
        //$maintainer->givePermissionTo('manage_contents');*/

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         // clear cache 
         app()['cache']->forget('spatie.permission.cache');
 
         // Clear all data table data
        $tableNames = config('permission.table_names');

        Model::unguard();
        DB::table($tableNames['role_has_permissions'])->delete();
        DB::table($tableNames['model_has_roles'])->delete();
        DB::table($tableNames['model_has_permissions'])->delete();
        DB::table($tableNames['roles'])->delete();
        DB::table($tableNames['permissions'])->delete();
        Model::reguard();

    }
}
