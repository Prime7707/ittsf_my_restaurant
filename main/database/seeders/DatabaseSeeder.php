<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	// public function run(): void
	// {
	// 	// User::factory(10)->create();

	// 	User::factory()->create([
	// 		'name' => 'Test User',
	// 		'email' => 'test@example.com',
	// 	]);
	// }
	public function run(): void
	{
		// User::factory(10)->create();

		// User::factory()->create([
		// 	'name' => 'Test User',
		// 	'email' => 'test@example.com',
		// ]);
		User::create([
			'username' => 'Admin',
			'email' => 'admin@sample.com',
			'password' => Hash::make('11111111'),
			'role' => 'admin',
			'status' => 1,
			'first_name' => 'Admin',
			'last_name' => 'Prime',
			'display_name' => 'Admin Prime',
			'phone' => '0000-0000000',

		]);

		User::create([
			'username' => 'User',
			'email' => 'user@sample.com',
			'password' => Hash::make('11111111'),
			'status' => 1,
			'first_name' => 'User',
			'last_name' => 'Prime',
			'display_name' => 'User Prime',
			'phone' => '0000-0000000',
		]);
	}
}
