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
     * Senha atual usada pela factory.
     */
    protected static ?string $password;

    /**
     * Define o estado padrão do modelo.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),  // Gera um nome aleatório
            'email' => fake()->unique()->safeEmail(),  // Gera um email único e seguro
            'email_verified_at' => now(),  // Define a data de verificação como o momento atual
            'password' => static::$password ??= Hash::make('password'),  // Hasheia a senha
            'remember_token' => Str::random(10),  // Gera um token aleatório
        ];
    }

    /**
     * Indica que o endereço de email do modelo deve ser não verificado.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,  // Define a data de verificação de email como nula
        ]);
    }
}