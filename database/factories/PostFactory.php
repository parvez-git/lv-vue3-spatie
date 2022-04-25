<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title      = $this->faker->sentence(5);
        $slug       = Str::slug($title);
        $userIds    = User::pluck('id')->toArray();

        return [
            'title'     => $title,
            'slug'      => $slug,
            'body'      => $this->faker->paragraph(3),
            'published' => true,
            'image'     => null,
            'user_id'   => $userIds[array_rand($userIds)],
        ];
    }
}
