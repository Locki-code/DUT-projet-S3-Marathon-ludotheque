<?php


namespace App\Services;


use App\Models\Commentaire;
use App\Models\Jeu;
use App\Models\User;
use phpDocumentor\Reflection\Types\Float_;

class JeuxPrice
{


    private $Jeu;

    private $average = 0;

    private $max = 0;

    private $min = 0;

    private $nbAchat = 0;

    private $nbUsers = 0;

    public function calculate()
    {

        if(!$this->Jeu instanceof Jeu){
            throw new \InvalidArgumentException('Jeu must be set');
        }

        $prices = [];

        foreach($this->Jeu->acheteurs as $achats){

            $prices[] = $achats->achat->prix;
        }

        if(count($prices) !== 0){
            $this->max = max($prices);
            $this->min = min($prices);
            $this->average = array_sum($prices) / count($prices);
            $this->nbAchat = count($prices);


            $this->nbUsers = User::all()->count();

        }


    }

    /**
     * @return mixed
     */
    public function getJeu()
    {
        return $this->Jeu;
    }

    /**
     * @param mixed $Jeu
     */
    public function setJeu(Jeu $Jeu)
    {
        $this->Jeu = $Jeu;
    }

    /**
     * @return mixed
     */
    public function getAverage(): float
    {
        return $this->average;
    }


    public function getMax(): float
    {
        return $this->max;
    }


    public function getMin(): float
    {
        return $this->min;
    }

    /**
     * @return int
     */
    public function getNbAchat()
    {
        return $this->nbAchat;
    }

    /**
     * @return int
     */
    public function getNbUsers()
    {
        return $this->nbUsers;
    }
}
