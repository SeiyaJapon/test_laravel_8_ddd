<?php

namespace Database\Factories;

use App\Models\Budget;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BudgetLine;

class BudgetLineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BudgetLine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $netAmount = $this->faker->randomFloat(2, 100, 1000);
        $vat = 21.00;
        $vatAmount = ($netAmount * $vat) / 100;
        return [
            'net_amount' => $netAmount,
            'vat' => $vat,
            'vat_amount' => $vatAmount,
            'total_amount' => $netAmount + $vatAmount,
            'budget_id' => Budget::factory()
        ];
    }
}
