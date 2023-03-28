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
            'sku' => 'personal',
            'stripe_key' => 'price_1MnGuIHwvhcWXVfotZEavnmw',
            'price' => 9.00,
            'name' => 'Personal Plan',
            'description' => 'Personal plan',
            'domains' => 1,
            'short_domains' => 0,
            'active' => 1,
        ]);

        Plan::create([
            'sku' => 'business',
            'stripe_key' => 'price_1MnyEzHwvhcWXVfotHTaLNeK',
            'price' => 14.00,
            'name' => 'Business Plan',
            'description' => 'Business plan',
            'domains' => 3,
            'short_domains' => 0,
            'active' => 1,
        ]);

        Plan::create([
            'sku' => 'agency',
            'stripe_key' => 'price_1MnyHGHwvhcWXVfo0R0uH2JA',
            'price' => 45.00,
            'name' => 'Agency Plan',
            'description' => 'Agency plan',
            'domains' => 99,
            'short_domains' => 0,
            'active' => 1,
        ]);
    }
}
