<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Carte extends Component
{
    public $jeu;
    /**
     * Create a new component jeu.
     *
     * @return void
     */
    public function __construct($jeu)
    {
        $this -> jeu = $jeu;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.carte');
    }
}
