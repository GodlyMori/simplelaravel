<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['GPU','CPU','MOBO','PSU','CASE','PERIPHERALS'];

        foreach ($categories as $name) {
            Category::firstOrCreate(['category_name' => $name]);
        }
    }
}
