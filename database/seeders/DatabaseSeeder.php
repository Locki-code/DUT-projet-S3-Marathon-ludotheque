<?php

namespace Database\Seeders;

use App\Models\Commentaire;
use App\Models\Jeu;
use App\Models\Mecanique;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        User::factory()->create([
            'name' => 'Robert Duchmol',
            'email' => 'robert.duchmol@domain.fr',
            'email_verified_at' => now(),
            'password' => '$2y$10$TKaVnYUC6y/IPQk8Gjaw7uBB.1xqNnqi/n4xo5uBH6Eok6ZrEpQdC', // secret00 je crois
            'remember_token' => Str::random(10),
        ]);
        $this->call(
            [
                EditeursSeederTable::class,
                MecaniquesSeeder::class,
                ThemesSeeder::class,
                UsersSeeder::class,
            ]
        );
        $faker = Factory::create('fr_FR');
        $jeux = Jeu::factory(50)->create();
        $mecanisque_ids = Mecanique::all()->pluck('id');
        $user_ids = User::all()->pluck('id');
        foreach ($jeux as $jeu) {
            $nbMecs = $faker->numberBetween(1, 3);
            $mecs = $faker->randomElements($mecanisque_ids, $nbMecs);
            $jeu->mecaniques()->attach($mecs);
            $nbAchats = $faker->numberBetween(2, 5);
            $achat_ids = $faker->randomElements($user_ids, $nbAchats);
            for ($i = 0; $i < $nbAchats; $i++) {
                $jeu->acheteurs()->attach($achat_ids[$i], ['lieu' => $faker->word(),
                    'prix' => $faker->randomFloat(2, 50, 250),
                    'date_achat' => $faker->dateTimeInInterval(
                        $startDate = '-6 months',
                        $interval = '+ 180 days',
                        $timezone = date_default_timezone_get()
                    )]);
            }
            $jeu->save();
        }
        Commentaire::factory(100)->create();
    }
}
