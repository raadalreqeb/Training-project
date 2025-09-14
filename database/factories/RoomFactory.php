<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{

    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {



        $images = [
    'https://images.unsplash.com/photo-1560448204-5e17c820c1e2',
    'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b',
    'https://images.unsplash.com/photo-1505691938895-1758d7feb511',
    'https://images.unsplash.com/photo-1501117716987-c8e1ecb2109f',
    'https://images.unsplash.com/photo-1560347876-aeef00ee58a1',
    'https://images.unsplash.com/photo-1560448070-375d6f320b2c',
    'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267',
    'https://images.unsplash.com/photo-1560347876-3f417fb1f0f8',
    'https://images.unsplash.com/photo-1542317854-3e3f8e10d5f3',
    'https://images.unsplash.com/photo-1505691938895-1758d7feb511',
];

$descriptions = [
    'Single' => [
        'A cozy single room with a comfortable bed, perfect for solo travelers.',
        'Compact room with all basic amenities and a warm atmosphere.',
        'Quiet single room ideal for work or rest during your stay.',
    ],
    'Double' => [
        'Spacious double room ideal for couples, with modern amenities.',
        'Double room with two comfortable beds and a city view.',
        'Bright and airy room perfect for friends or couples.',
    ],
    'Suite' => [
        'Luxury suite with a private balcony, living area, and premium facilities.',
        'Elegant suite with a king-size bed and stunning ocean view.',
        'Spacious suite with separate lounge area and deluxe bathroom.',
    ]
];

             $types = ['Single', 'Double', 'Suite'];
             $type = $types[array_rand($types)];
        $statuses = ['available', 'booked', 'maintenance'];

        return [
            'number'=>fake()->unique()->numberBetween(100,999),
            'type' => $types[array_rand($types)],
            'price' =>fake()->randomFloat(2,50 , 500),
            'status' => $statuses[array_rand($statuses)],
               'image' => $images[array_rand($images)],
           'description'=>$descriptions[$type][array_rand($descriptions[$type])],

               'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
