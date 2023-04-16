<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Plan::create([
            'sku' => 'standard',
            'stripe_key' => 'price_1MqyrTHwvhcWXVfoDymTB5lf',
            'price' => 16.00,
            'stripe_key_annual' => 'price_1MqyrTHwvhcWXVfonHuo86Ux',
            'price_annual' => 176.00,
            'name' => 'Standard',
            'description' => 'Standard plan',
            'domains' => 1,
            'short_domains' => true,
            'seats' => 1,
            'links' => -1,
            'active' => 1,
        ]);

        Plan::create([
            'sku' => 'freelancer',
            'stripe_key' => 'price_1MqytRHwvhcWXVfoqbSntV2t',
            'price' => 40.00,
            'stripe_key_annual' => 'price_1MqytRHwvhcWXVforsAp3Dc3',
            'price_annual' => 440.00,
            'name' => 'Freelancer',
            'description' => 'Freelancer plan',
            'domains' => 5,
            'short_domains' => true,
            'seats' => 5,
            'links' => -1,
            'active' => 1,
        ]);

        Plan::create([
            'sku' => 'agency',
            'stripe_key' => 'price_1MqyuMHwvhcWXVfoRr3yoH8P',
            'price' => 105.00,
            'stripe_key_annual' => 'price_1MqyuMHwvhcWXVfoifShywIn',
            'price_annual' => 1155.00,
            'name' => 'Agency',
            'description' => 'Agency plan',
            'domains' => 20,
            'short_domains' => true,
            'seats' => 10,
            'links' => -1,
            'active' => 1,
        ]);
    }
}
