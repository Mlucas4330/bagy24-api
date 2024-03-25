<?php

namespace Database\Seeders;

use App\Models\Seller;
use App\Models\Sale;
use App\Models\SaleCommission;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Seller::factory(5)->create();
        Sale::factory(25)->create();
        SaleCommission::factory(25)->create();
    }
}
