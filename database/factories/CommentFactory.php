<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'text' => $this->faker->realTextBetween(10, 60),
            'post_id' => $this->faker->randomElement(Post::query()->pluck('id')),
            'user_id' => $this->faker->randomElement(User::query()->pluck('id')),
            'created_at' => $this->faker->dateTimeBetween('-3 day'),
        ];
    }
}
