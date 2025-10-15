<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        $admin =new Role();
        $admin->name ='admin';
        $admin->description = 'System Administrator';
        $admin->save();

        $staff=new role();
        $staff->name = 'staff';
        $staff->description ='KMPDC Staff';
        $staff->save();

        $guest=new role();
        $guest->name =  'guest';
        $guest->description =  'Guest';
        $guest->save();

        Schema::enableForeignKeyconstraints();
    
    }
}