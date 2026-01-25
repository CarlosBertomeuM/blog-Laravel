<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::all();
        
        foreach ($users as $user) {
            \App\Models\Post::factory()->count(3)->create([
                'usuari_id' => $user->id
            ]);
        }
    }
}
