<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Property;
use App\REO\Utils\Constants;

class PropertyFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'property_type' => "sfsdflasdjfsdf-dfsfsdfsdf-sdfsfsf-sdfsdf",
            'fields' =>  json_encode([
                Constants::DEFAULT_PROPERTY_FIELDS[0] => $this->faker->numberBetween(100,999),
                Constants::DEFAULT_PROPERTY_FIELDS[1] => $this->faker->numberBetween(1999,2022),
                Constants::DEFAULT_PROPERTY_FIELDS[2] => $this->faker->numberBetween(1,20),
                Constants::DEFAULT_PROPERTY_FIELDS[3] => $this->faker->randomElement(Constants::DEFAULT_HEATING_TYPES),
                Constants::DEFAULT_PROPERTY_FIELDS[4] => $this->faker->randomElement(Constants::DEFAULT_PARKINGS),
                Constants::DEFAULT_PROPERTY_FIELDS[5] => $this->faker->randomFloat(1,10.5, 99.9),
                Constants::DEFAULT_PROPERTY_FIELDS[6] => $this->faker->numberBetween(1000,9999),   
            ])
        ];
    }
}
