<?php

namespace Database\Factories;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SaleComission>
 */
class SaleCommissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $commission_percentage = 8.5;

        $sale = Sale::inRandomOrder()->first();

        $value = $sale->value * ($commission_percentage / 100);

        return [
            'sale_id' => $sale->id,
            'commission_percentage' => $commission_percentage,
            'value' => $value,
            'commission_date' => $sale->sale_date,
        ];
    }
}
