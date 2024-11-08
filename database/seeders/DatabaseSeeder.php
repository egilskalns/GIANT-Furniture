<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
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

        Product::factory(5000)->create();

        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'title' => 'Mr',
            'country_region' => 1,
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password' => 'admin'
        ]);

        User::factory(1000)->create();

        $countries = [
            ['name' => 'Latvia', 'iso_code' => 'LV'],
            ['name' => 'United States', 'iso_code' => 'US'],
            ['name' => 'Canada', 'iso_code' => 'CA'],
            ['name' => 'United Kingdom', 'iso_code' => 'GB'],
            ['name' => 'Australia', 'iso_code' => 'AU'],
            ['name' => 'Germany', 'iso_code' => 'DE'],
            ['name' => 'France', 'iso_code' => 'FR'],
            ['name' => 'Japan', 'iso_code' => 'JP'],
            ['name' => 'China', 'iso_code' => 'CN'],
            ['name' => 'Brazil', 'iso_code' => 'BR'],
            ['name' => 'India', 'iso_code' => 'IN'],
            ['name' => 'Italy', 'iso_code' => 'IT'],
            ['name' => 'Spain', 'iso_code' => 'ES'],
            ['name' => 'Netherlands', 'iso_code' => 'NL'],
            ['name' => 'South Korea', 'iso_code' => 'KR'],
            ['name' => 'Russia', 'iso_code' => 'RU'],
            ['name' => 'Mexico', 'iso_code' => 'MX'],
            ['name' => 'Switzerland', 'iso_code' => 'CH'],
            ['name' => 'Turkey', 'iso_code' => 'TR'],
            ['name' => 'Sweden', 'iso_code' => 'SE'],
            ['name' => 'Belgium', 'iso_code' => 'BE'],
            ['name' => 'Austria', 'iso_code' => 'AT'],
            ['name' => 'Poland', 'iso_code' => 'PL'],
            ['name' => 'Norway', 'iso_code' => 'NO'],
            ['name' => 'Denmark', 'iso_code' => 'DK'],
            ['name' => 'Finland', 'iso_code' => 'FI'],
            ['name' => 'Ireland', 'iso_code' => 'IE'],
            ['name' => 'South Africa', 'iso_code' => 'ZA'],
            ['name' => 'New Zealand', 'iso_code' => 'NZ'],
            ['name' => 'Singapore', 'iso_code' => 'SG'],
            ['name' => 'Malaysia', 'iso_code' => 'MY'],
            ['name' => 'Saudi Arabia', 'iso_code' => 'SA'],
            ['name' => 'United Arab Emirates', 'iso_code' => 'AE'],
            ['name' => 'Israel', 'iso_code' => 'IL'],
            ['name' => 'Portugal', 'iso_code' => 'PT'],
            ['name' => 'Czech Republic', 'iso_code' => 'CZ'],
            ['name' => 'Greece', 'iso_code' => 'GR'],
            ['name' => 'Hungary', 'iso_code' => 'HU'],
            ['name' => 'Argentina', 'iso_code' => 'AR'],
            ['name' => 'Thailand', 'iso_code' => 'TH'],
            ['name' => 'Vietnam', 'iso_code' => 'VN'],
            ['name' => 'Philippines', 'iso_code' => 'PH'],
            ['name' => 'Egypt', 'iso_code' => 'EG'],
            ['name' => 'Chile', 'iso_code' => 'CL'],
            ['name' => 'Colombia', 'iso_code' => 'CO'],
            ['name' => 'Indonesia', 'iso_code' => 'ID'],
            ['name' => 'Ukraine', 'iso_code' => 'UA'],
            ['name' => 'Romania', 'iso_code' => 'RO'],
            ['name' => 'Hong Kong', 'iso_code' => 'HK'],
            ['name' => 'Ireland', 'iso_code' => 'IE'],
            ['name' => 'Luxembourg', 'iso_code' => 'LU'],
            ['name' => 'Qatar', 'iso_code' => 'QA'],
        ];

        DB::table('country_regions')->insert($countries);

        Address::factory(1000)->create();
    }
}
