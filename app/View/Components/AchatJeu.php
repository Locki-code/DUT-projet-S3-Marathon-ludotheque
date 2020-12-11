<?php

namespace App\View\Components;

use App\Models\Jeu;
use App\Models\User;
use Illuminate\View\Component;

class AchatJeu extends Component
{
    public $jeu;
    public $user;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Jeu $jeu, User $user)
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
