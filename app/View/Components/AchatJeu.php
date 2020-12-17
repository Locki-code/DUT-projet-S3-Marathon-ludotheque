<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AchatJeu extends Component
{
    public $jeu;
    public $user;

    /**
     * Create a new component instance.
     *
     * @param $user
     * @param $jeu
     */
    public function __construct($user, $jeu)
    {
        $this->user = $user;
        $this->jeu = $jeu;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.achat-jeu');
    }
}
