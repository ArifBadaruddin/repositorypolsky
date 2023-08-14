<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class postFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2,5)),
        
            'author' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            'prodi' => $this->faker->name(),
            'nomorinduk' => $this->faker->name(),
            // 'body' =>'<p>' . implode('</p><p>',$this->faker->paragraphs(mt_rand(5,10))). '</p>',   cara untuk paragraph
            'body' =>collect($this->faker->paragraphs(mt_rand(5,10)))
                        ->map(fn($p) =>"<p>$p</p>")
                        ->implode(''),
            'user_id' => mt_rand(1,4),
            'category_id' => mt_rand(1,3),
            
        ];
    }
}
