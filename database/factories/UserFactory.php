<?php

namespace Database\Factories;

use App\Constants\GlobalConstants;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = $this->faker->randomElement(GlobalConstants::LIST_TYPE);
        $frameworkFront = array("Vuejs", "React");
        $frameworkBack = array("Symfony", "Laravel" , "Django");

        /*if ($type == 'frontend'){
             $framework = array_rand(array_flip($frameworkFront));
        }
        else{
            $framework = array_rand(array_flip($frameworkBack));
        }*/

        $type == 'frontend' ? $framework = array_rand(array_flip($frameworkFront)) : $framework = array_rand(array_flip($frameworkBack));
        return [
            'fname' => $this->faker->name,
            'lname' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'type' => $type,
            'framework' => $framework,
            'country' => $this->faker->randomElement(GlobalConstants::LIST_COUNTRIES),
            'address' => $this->faker->address,
            'password' => Hash::make('password'),
            /*'social_photo' => $faker->imageUrl($width = 200, $height = 200),*/
            'remember_token' => Str::random(10),
        ];
    }
}
