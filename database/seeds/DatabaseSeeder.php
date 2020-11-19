<?php

use App\Models\Category;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Staff;
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
        // SETTING TABLES
        $settings = [
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

        // SETTING STAFF
        $admin = Staff::create(
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123')
            ]
        );

        // SETTING CATEGORY
        $categories = [
            ['name' => 'SPORTSWEAR', 'slug' => 'men',     'parent_id' => 0],
            ['name' => 'MENS', 'slug' => 'women',     'parent_id' => 0],
            ['name' => 'WOMENS', 'slug' => 'kid',     'parent_id' => 0],
            ['name' => 'KIDS', 'slug' => 'winter',     'parent_id' => 0],
            ['name' => 'FASHION', 'slug' => 'autums',     'parent_id' => 0],
            ['name' => 'HOUSEHOLDS', 'slug' => 'autums',     'parent_id' => 0],
            ['name' => 'INTERIORS', 'slug' => 'autums',     'parent_id' => 0],
            ['name' => 'NIKE', 'slug' => 'autums',     'parent_id' => 1],
            ['name' => 'UNDER ARMOUR', 'slug' => 'autums',     'parent_id' => 1],
            ['name' => 'ADIDAS', 'slug' => 'autums',     'parent_id' => 1],
            ['name' => 'PUMA', 'slug' => 'autums',     'parent_id' => 1],
            ['name' => 'FENDI', 'slug' => 'autums',     'parent_id' => 1],
            ['name' => 'VALENTINO', 'slug' => 'autums',     'parent_id' => 1],
            ['name' => 'DIOR', 'slug' => 'autums',     'parent_id' => 2],
            ['name' => 'VERSACE', 'slug' => 'autums',     'parent_id' => 2],
            ['name' => 'GUESS', 'slug' => 'autums',     'parent_id' => 3],

        ];
        foreach ($categories as  $categorie) {
            Category::create($categorie);
        };

        // SETTING TABLES
        $sliders = [
            ['name' => 'ƯU ĐÃI KHỦNG NGÀY 12 tháng 5!!', 'description' => ' Từ ngày 20/3 giảm giá tất cả các mạt ang túi xách', 'image_path' => '/storage/slider/1/default.jpg',     'image_name' => 'default.jpg'],
            ['name' => 'Đặt hàng vinsmart lãi suất 0%', 'description' => ' Từ ngày 20/3 giảm giá tất cả các mạt ang túi xách', 'image_path' => '/storage/slider/1/default1.jpg',     'image_name' => 'default1.jpg'],
        ];
        foreach ($sliders as  $slider) {
            Slider::create($slider);
        };
    }
}
