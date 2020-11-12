<?php

use App\Models\Setting;
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
        $settings =[
            ['config_key' => 'facebook',     'config_value' => 'https://www.facebook.com/ducnam0109/'],
            ['config_key' => 'twitter',     'config_value' => 'https://www.twitter.com/ducnam0109/'],
            ['config_key' => 'linkedin',     'config_value' => 'https://www.linkedin.com/ducnam0109/'],
            ['config_key' => 'dribbble',     'config_value' => 'https://www.dribbble.com/ducnam0109/'],
            ['config_key' => 'google',     'config_value' => 'https://www.google.com/ducnam0109/'],
            ['config_key' => 'phone',     'config_value' => '+8498 290602'],
            ['config_key' => 'email',     'config_value' => 'ducnamk11@gmail.com'],
        ];
        foreach ($settings as  $setting) {
            Setting::create($setting);
        };



        $admin = Staff::create(
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123')
            ]
        );

        // // create permissions
        // Permission::create(['name' => 'edit category']);
        // Permission::create(['name' => 'delete category']);
        // Permission::create(['name' => 'add category']);

        // // create permissions
        // Permission::create(['name' => 'check order']);
        // Permission::create(['name' => 'comfirm order']);
        // Permission::create(['name' => 'cancel order']);

        // // create permissions
        // Permission::create(['name' => 'edit product']);
        // Permission::create(['name' => 'delete product']);
        // Permission::create(['name' => 'add product']);

        // // create permissions
        // Permission::create(['name' => 'edit role']);
        // Permission::create(['name' => 'delete role']);
        // Permission::create(['name' => 'add role']);

        // // // or may be done by chaining
        // $role = Role::create(['name' => 'staff'])
        //     ->givePermissionTo(['check order', 'check order']);

        // // // or may be done by chaining
        // // $roleadmin = Role::create(['name' => 'admin'])
        // //     ->givePermissionTo(['edit category', 'add category', 'edit product', 'add product', 'delete product']);


        // // $rolesuper = Role::create(['name' => 'super-admin']);
        // // $rolesuper->givePermissionTo(Permission::all());
        // // $admin->syncRoles($rolesuper);
    }
}
