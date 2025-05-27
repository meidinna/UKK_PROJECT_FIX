<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(50),
            'content' => $this->faker->paragraph(),
            'image' => '',
        ];
    }

    /**
     * Run the factory to create seed data
     */
    public function run(): void
    {
        // entry data untuk table posts 1 record
        // Post::create( // untuk membuat menggunakan method create()
        // jadi [ // array yg jadi menggunakan kurung siku
        //     'name'=>'GPT',
        //     'content'=>'teknologi AI',
        //     'image'=>'',
        // ] 
        // );

        Post::factory()->count(100)->create();
    }
}