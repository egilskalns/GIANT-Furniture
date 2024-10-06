<?php

namespace Database\Seeders;

use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Living room'
            ],
            [
                'name' => 'Bedroom'
            ],
            [
                'name' => 'Child room'
            ],
            [
                'name' => 'Kitchen'
            ],
            [
                'name' => 'Bathroom'
            ],
            [
                'name' => 'Hall'
            ],
            [
                'name' => 'Office'
            ],
            // Living room subcategories
            [
                'name' => 'Sofas',
                'parent_id' => 1
            ],
            [
                'name' => 'Coffee tables',
                'parent_id' => 1
            ],
            [
                'name' => 'TV stands',
                'parent_id' => 1
            ],
            [
                'name' => 'Bookshelves',
                'parent_id' => 1
            ],
            // Bedroom subcategories
            [
                'name' => 'Beds',
                'parent_id' => 2
            ],
            [
                'name' => 'Wardrobes',
                'parent_id' => 2
            ],
            [
                'name' => 'Nightstands',
                'parent_id' => 2
            ],
            [
                'name' => 'Dressers',
                'parent_id' => 2
            ],
            // Child room subcategories
            [
                'name' => 'Bunk beds',
                'parent_id' => 3
            ],
            [
                'name' => 'Toy storage',
                'parent_id' => 3
            ],
            [
                'name' => 'Play tables',
                'parent_id' => 3
            ],
            [
                'name' => 'Study desks',
                'parent_id' => 3
            ],
            // Kitchen subcategories
            [
                'name' => 'Kitchen tables',
                'parent_id' => 4
            ],
            [
                'name' => 'Kitchen cabinets',
                'parent_id' => 4
            ],
            [
                'name' => 'Seating',
                'parent_id' => 4
            ],
            [
                'name' => 'Pantry storage',
                'parent_id' => 4
            ],
            // Bathroom subcategories
            [
                'name' => 'Bathroom mirrors',
                'parent_id' => 5
            ],
            [
                'name' => 'Shower curtains',
                'parent_id' => 5
            ],
            [
                'name' => 'Bath mats',
                'parent_id' => 5
            ],
            [
                'name' => 'Towel racks',
                'parent_id' => 5
            ],
            // Hall subcategories
            [
                'name' => 'Coat racks',
                'parent_id' => 6
            ],
            [
                'name' => 'Shoe cabinets',
                'parent_id' => 6
            ],
            [
                'name' => 'Console tables',
                'parent_id' => 6
            ],
            [
                'name' => 'Umbrella stands',
                'parent_id' => 6
            ],
            // Office subcategories
            [
                'name' => 'Desks',
                'parent_id' => 7
            ],
            [
                'name' => 'Office chairs',
                'parent_id' => 7
            ],
            [
                'name' => 'Filing cabinets',
                'parent_id' => 7
            ],
            [
                'name' => 'Bookshelves',
                'parent_id' => 7
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        Product::factory(1000)->create();
    }
}
