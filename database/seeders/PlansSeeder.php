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
            'sku' => 'trial',
            'stripe_key' => '',
            'price' => 0,
            'price_annual' => 0,
            'name' => 'Trial',
            'description' => '2 week trial',
            'domains' => 1,
            'short_domains' => false,
            'seats' => 1,
            'links' => 500,
            'active' => 1,
        ]);

        Plan::create([
            'sku' => 'standard',
            'stripe_key' => 'price_1MnGuIHwvhcWXVfotZEavnmw',
            'price' => 16.00,
            'price_annual' => 176.00,
            'name' => 'Standard',
            'description' => 'Standard plan',
            'domains' => 1,
            'short_domains' => true,
            'seats' => 1,
            'links' => 500,
            'active' => 1,
        ]);

        Plan::create([
            'sku' => 'freelancer',
            'stripe_key' => 'price_1MnyEzHwvhcWXVfotHTaLNeK',
            'price' => 40.00,
            'price_annual' => 440.00,
            'name' => 'Freelancer',
            'description' => 'Freelancer plan',
            'domains' => 5,
            'short_domains' => true,
            'seats' => 5,
            'links' => 1000,
            'active' => 1,
        ]);

        Plan::create([
            'sku' => 'agency',
            'stripe_key' => 'price_1MnyHGHwvhcWXVfo0R0uH2JA',
            'price' => 105.00,
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
