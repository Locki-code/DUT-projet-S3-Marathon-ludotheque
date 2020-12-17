<?php

namespace Database\Seeders;

use App\Models\Commentaire;
use App\Models\Editeur;
use App\Models\Jeu;
use App\Models\Mecanique;
use App\Models\Theme;
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
        $jeux = Jeu::factory(100)->create();
        $mecanisque_ids = Mecanique::all()->pluck('id');
        $user_ids = User::all()->pluck('id');
        $jeu = new Jeu();
        $jeu->theme_id = Theme::where('nom','Autres')->pluck('id')->first();
        $jeu->nom='Andor';
        $jeu->description='Jeu de 2 à 4 joueurs. \n Plongez dans un univers de légendes épiques et de hauts faits héroïques.
        Andor est un jeu de plateau et d\'aventures qui se joue en mode coopératif et vous plonge dans un univers de légendes épiques et de hauts faits héroïques';
        $jeu->regles='';
        $jeu->user_id=5;
        $ed = new Editeur();
        $ed->nom = 'lello';
        $ed->save();
        $jeu->editeur_id = Editeur::where('nom','lello')->pluck('id')->first();
        $jeu->langue='anglais';
        $jeu->url_media='https://images-na.ssl-images-amazon.com/images/I/91MSg3Y%2BcOL._AC_SY355_.jpg';
        $jeu->age=10;
        $jeu->nombre_joueurs=4;
        $jeu->duree='2 hours';
        $jeu->categorie='Jeu d\'Ambiance';
        $jeu->save();


        $jeu2 = new Jeu();
        $jeu2->theme_id = Theme::where('nom','Autres')->pluck('id')->first();
        $jeu2->nom='Andor';
        $jeu2->description='Jeu de 2 à 4 joueurs. \n Plongez dans un univers de légendes épiques et de hauts faits héroïques.
        Andor est un jeu de plateau et d\'aventures qui se joue en mode coopératif et vous plonge dans un univers de légendes épiques et de hauts faits héroïques';
        $jeu2->regles='';
        $jeu2->user_id=5;
        $ed = new Editeur();
        $ed->nom = 'lello';
        $ed->save();
        $jeu2->editeur_id = Editeur::where('nom','lello')->pluck('id')->first();
        $jeu2->langue='anglais';
        $jeu2->url_media='https://www.espritjeu.com/upload/image/andor-p-image-49244-grande.jpg';
        $jeu2->age=10;
        $jeu2->nombre_joueurs=4;
        $jeu2->duree='2 hours';
        $jeu2->categorie='Jeu d\'Ambiance';
        $jeu2->save();


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
