<?php

namespace Database\Seeders;

use App\Models\DeliveryOption;
use Illuminate\Database\Seeder;

class ProductDeliveryOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deliveries = [
            ['name' => 'Global'],
            ['name' => 'National'],
            ['name' => 'Limited National'],
            ['name' => 'Pickup'],
            ['name' => 'locak Delivery'],
        ];

        foreach ($deliveries as $delivery) {
            DeliveryOption::create($delivery);
        }
    }
}
