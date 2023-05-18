<?php

namespace Database\Seeders;

use App\Models\Admin\Category;
use App\Models\Admin\ProductType;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.  
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['title' => 'Luxaurolicious'],
            ['title' => 'Luxauro Fresh'],
            ['title' => 'Antiques'],
            ['title' => 'Vintage'],
            ['title' => 'Street Market'],
            ['title' => 'Luxauro Library'],
            ['title' => 'Other'],
            
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
        ProductType::create([
            'title' => 'Sports'
        ]);
    }
}
