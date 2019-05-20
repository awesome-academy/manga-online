<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('permissions')->truncate();

        Permission::create([
            'code' => 'superadmin',
            'title' => 'Full quyền ',
        ]);
        Permission::create([
            'code' => 'manage-user',
            'title' => 'Quyền quản lý user',    
        ]);
        Permission::create([
            'code' => 'manage-manga',
            'title' => 'Quyền quản lý truyện',      
        ]);
    }
}
