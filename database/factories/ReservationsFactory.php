<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\User;
use App\Models\Reservations;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservations>
 */
class ReservationsFactory extends Factory
{

    protected $model = Reservations::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

    


        $start = fake()->dateTimeBetween('now', '+1 month');
        $end = (clone $start)->modify('+'.fake()->numberBetween(1, 7).' days');
        return [
            'user_id' => User::pluck('user_id')->random(),
            'room_id' => Room::inRandomOrder()->first()?->room_id ?? 1,
            'start_date' => $start,
            'end_date' => $end,
            'status' => fake()->randomElement(['pending', 'confirmed', 'cancelled']),
            'payment_status' => fake()->randomElement(['unpaid', 'paid']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
