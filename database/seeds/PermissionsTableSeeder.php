<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            'manage-post',
            'manage-comment',
            'manage-user',
            'manage-category'
        ];

        foreach($permission as $permission){
            Permission::create(['name'=>$permission]);
        }
    }
}
