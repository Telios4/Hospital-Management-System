<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Status::truncate();
        
        $active = new Status();
        $active->name = 'active';
        $active->description = 'Active practitioner';
        $active->save();

        $inactive = new Status();
        $inactive->name = 'inactive';
        $inactive->description = 'Inactive practitioner';
        $inactive->save();

        $suspended = new Status();
        $suspended->name = 'suspended';
        $suspended->description = 'Suspended practitioner';
        $suspended->save();

        Schema::enableForeignKeyConstraints();
    }
}