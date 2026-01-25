<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $login = fake()->unique()->userName();
        
        return [
            'login' => $login,
            'password' => bcrypt($login), // Ara amb bcrypt
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'login' => 'required|unique:users|min:3',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'login' => $request->login,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);
        
        return redirect()->route('posts.index');
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
