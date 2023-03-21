<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /** @var string  */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'content' => $this->faker->text,
            'user_id' => User::get()->random()->id,
            'image' => $this->faker->imageUrl,
            'likes' => random_int(1, 50),
            'is_published' => 1,
            'category_id' => Category::get()->random()->id,
        ];
    }
}
