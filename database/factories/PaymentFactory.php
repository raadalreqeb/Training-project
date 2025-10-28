<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition(): array
    {
        return [
            'invoice_id' => Invoice::factory(),
            'payment_method' => $this->faker->randomElement(['cash', 'visa', 'online']),
            'amount' => $this->faker->randomFloat(2, 50, 500),
            'transaction_id' => $this->faker->optional()->uuid(),
            'payment_status' => $this->faker->randomElement(['pending', 'completed', 'failed']),
            'paid_at' => $this->faker->optional()->dateTime(),
            'notes' => $this->faker->optional()->sentence(),
        ];
    }
}
