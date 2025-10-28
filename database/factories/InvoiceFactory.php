<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Reservations;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition(): array
    {
        $totalAmount = $this->faker->randomFloat(2, 100, 1000);
        $taxAmount = $totalAmount * 0.16;
        $discount = $this->faker->randomFloat(2, 0, 50);
        $finalAmount = $totalAmount + $taxAmount - $discount;

        return [
            'reservation_id' => Reservations::factory(),
            'invoice_number' => 'INV-' . date('Y') . '-' . str_pad($this->faker->unique()->numberBetween(1, 9999), 4, '0', STR_PAD_LEFT),
            'total_amount' => $totalAmount,
            'tax_amount' => $taxAmount,
            'discount' => $discount,
            'final_amount' => $finalAmount,
            'status' => $this->faker->randomElement(['pending', 'paid', 'cancelled']),
            'issued_date' => $this->faker->date(),
            'due_date' => $this->faker->optional()->date(),
        ];
    }
}
