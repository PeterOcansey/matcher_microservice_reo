<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SearchProfile;
use App\REO\Utils\Constants;
use App\REO\Utils\Generators;

class SearchProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SearchProfile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'property_type' => strtolower(Generators::generateRandomUniqHash()),
            'search_fields' => json_encode([
                    Constants::DEFAULT_PROFILE_SEARCH_FIELDS[0] => $this->getSearchFiledData( $this->faker->numberBetween(100, 1000) ),
                    Constants::DEFAULT_PROFILE_SEARCH_FIELDS[1] => $this->getSearchFiledData( $this->faker->numberBetween(1980, 2022) ),
                    Constants::DEFAULT_PROFILE_SEARCH_FIELDS[2] => $this->getSearchFiledData( $this->faker->numberBetween(1, 15) ),
                    Constants::DEFAULT_PROFILE_SEARCH_FIELDS[3] => $this->getSearchFiledData( $this->faker->randomElement(Constants::DEFAULT_HEATING_TYPES) ),
                    Constants::DEFAULT_PROFILE_SEARCH_FIELDS[4] => $this->getSearchFiledData( $this->faker->randomElement(Constants::DEFAULT_PARKINGS) ),
                    Constants::DEFAULT_PROFILE_SEARCH_FIELDS[5] => $this->getSearchFiledData( $this->faker->randomFloat(1, 20.5, 40.5, 100) ),
                    Constants::DEFAULT_PROFILE_SEARCH_FIELDS[6] => $this->getSearchFiledData( $this->faker->numberBetween(10000, 100000) ),
                    Constants::DEFAULT_PROFILE_SEARCH_FIELDS[7] => $this->getSearchFiledData( $this->faker->randomFloat(1, 20.5, 60.5, 100) ),
                ]),
        ];
    }

    public function getSearchFiledData($val)
    {
        return [$this->faker->randomElement([$val, null]), $this->faker->randomElement([$val, null])];
    }
}
