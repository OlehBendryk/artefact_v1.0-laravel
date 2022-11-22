<?php

namespace Database\Factories;


use App\Models\Moderator;
use App\Models\Subdomain;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ModeratorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Moderator::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $superadmin = [
            'subdomain_id' => Subdomain::where('subdomain','artefact.localtest.me')->first()->id,
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make(12121212),
            'remember_token' => Str::random(10),
        ];

        return $superadmin;
    }
}
