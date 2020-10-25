<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Modes\Staff;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      
        $admin = Staff::create(
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123'), 
            ]);

        // create permissions
        Permission::create(['name' => 'edit category']);
        Permission::create(['name' => 'delete category']);
        Permission::create(['name' => 'add category']);
        // create permissions
        Permission::create(['name' => 'check order']);
        Permission::create(['name' => 'comfirm order']);
        Permission::create(['name' => 'cancel order']);
        // create permissions
        Permission::create(['name' => 'edit product']);
        Permission::create(['name' => 'delete product']);
        Permission::create(['name' => 'add product']);

        // create permissions
        Permission::create(['name' => 'edit role']);
        Permission::create(['name' => 'delete role']);
        Permission::create(['name' => 'add role']);

        // or may be done by chaining
        $role = Role::create(['name' => 'staff'])
            ->givePermissionTo(['check order', 'check order']);

        // or may be done by chaining
        $roleadmin = Role::create(['name' => 'admin'])
            ->givePermissionTo(['edit category', 'add category', 'edit product', 'add product', 'delete product']);


        $rolesuper = Role::create(['name' => 'super-admin']);
        $rolesuper->givePermissionTo(Permission::all());
        $admin->syncRoles($rolesuper);
    }
}
