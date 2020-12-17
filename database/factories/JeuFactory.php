<?php

namespace Database\Factories;

use App\Models\Editeur;
use App\Models\Jeu;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class JeuFactory extends Factory {

    const nom = ['Letter Jam','Unlock!','Demeter','Napoleon Saga','Kingdomino',
        'Not Alone','Aventuriers du Rail France','Century - Un nouveau monde','Harry Potter',
        'Catan','Exploding kittens','Monopoly','Letter Jam','Préhistories','Ma première aventure',
        '50 Clues','Fiesta De Los Muertos','Panic Island','Kontour','Lobo 77'];

    const description = ['Enfin un jeu de dessin qui tient dans la poche et ne demande aucun talent de dessinateur !',
    'un jeu de cartes inspiré du Rami avec 5 couleurs et une bonne dose de malice en plus','le créateur de Magic The Gathering Vous connaissiez King of Tokyo ? Et bien découvrez le nouveau visage du jeu avec des illustrations signées Régis Torrès, le talentueux illustrateur de King of New York.',
    'Comment, vous ne connaissez pas Thiercelieux ?
Un si joli petit village de l\'est bien à l\'abri des vents et du froid, niché entre de charmantes forêts et de bons pâturages. ',
        'est bien plus qu\'un jeu de société, c\'est tout simplement le premier jeu de sociologie critique.'
    ];

    const regles = ['contrairement aux variantes allemandes, espagnoles et américaines qui se jouent sur des damiers de 8×8 cases, le jeu de Dames internationales (ou françaises) est un jeu de stratégie qui se joue sur un Damier de  10×10 cases.',
        'Les joueurs possèdent un même nombre de pions devant eux, par commodité. En effet, ces pions n’appartiennent à personne. Si l’un des adversaire n’a plus de pions devant lui, il peut piocher dans la réserve de l’autre joueur.',
        'L’herbe est toujours plus verte dans le pré d’à côté ! Dans ce jeu abstrait multijoueur au gameplay épuré, divisez vos moutons pour mieux régner sur les pâturages.'

    ];

    const lien = ['https://images-na.ssl-images-amazon.com/images/I/71Eql36Ly8L._AC_SY355_.jpg','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmA0LkoClL41T1SvYDboMtUeHDjzP5jEcUlEsrfXvIumhsLZr04v_SgX-5KbhRPmI1IQs7C5JP0RUc_BVXkPY_nUDKF6ZvAg512g&usqp=CAU&ec=45750088',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSsoJ_kwkz7giI9yDTy1ByaBqW01ZYcMxE5rj-oaPD02JmrZBxV39mgp2_S34GtJQgWeUYeRDlQBjkGR5K7MfOBgJngW_V5wYdyQ&usqp=CAU&ec=45750088',
    'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-qB0c2tB9ig2B_dTsGE4odV21i-8Ul01IT72uSEnBGWQCUuI40I7GOgJS9wORW3VbV-FVEVjILnVVEmjw4EvCiY1eatlSdPjlKQ&usqp=CAU&ec=45750088',
        'https://i.ebayimg.com/images/g/-A4AAOSw-m1ey687/s-l300.jpg','https://images.king-jouet.com/6/GU242083_6.jpg','https://gentlemanmoderne.com/wp-content/uploads/2018/09/jeu-de-societe-adulte-meilleur-burger-quizz.jpg','https://i.pinimg.com/474x/19/67/13/196713e5b853a04546e07c0981406dce.jpg','https://www.numerama.com/content/uploads/2020/06/dicycle_race-0.png','https://www.goupiya.com/c/301-category_default/par-ordre-alphabetique.jpg','https://www.cocktailgames.com/wp-content/uploads/2018/07/Twin_it_jeux_boite_3D_BD.jpg','https://i0.wp.com/gusandco.net/wp-content/uploads/2018/08/catane.jpg?resize=525%2C525&ssl=1','https://images-na.ssl-images-amazon.com/images/I/71pmfTLaP-L._AC_SX355_.jpg','https://images-na.ssl-images-amazon.com/images/I/91YZJppjyhL._AC_SX355_.jpg'
        ];


    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jeu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        $theme_ids = Theme::all()->pluck('id');
        $editeurs_ids = Editeur::all()->pluck('id');
        $user_ids = User::all()->pluck('id');
        return [
            'nom' => $this->faker->randomElement(self::nom),
            'description' => $this->faker->randomElement(self::description),
            'regles' => $this->faker->randomElement(self::regles),
            'user_id' => $this->faker->randomElement($user_ids),
            'theme_id' => $this->faker->randomElement($theme_ids),
            'editeur_id' => $this->faker->randomElement($editeurs_ids),
            'url_media' => $this->faker->randomElement(self::lien),
        ];
    }
}
