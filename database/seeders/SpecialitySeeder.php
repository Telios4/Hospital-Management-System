<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Speciality;

class SpecialitySeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Speciality::truncate();
        
        $surgery = new Speciality();
        $surgery->name = 'Surgery';
        $surgery->save();

        $medicine = new Speciality();
        $medicine->name = 'Medicine';
        $medicine->save();

        $pediatrics = new Speciality();
        $pediatrics->name = 'Pediatrics';
        $pediatrics->save();

        $psychiatry = new Speciality();
        $psychiatry->name = 'Psychiatry';
        $psychiatry->save();

        Schema::enableForeignKeyConstraints();
    }
}