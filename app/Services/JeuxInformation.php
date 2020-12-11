<?php


namespace App\Services;


use App\Models\Commentaire;
use App\Models\Jeu;
use phpDocumentor\Reflection\Types\Float_;

class JeuxInformation{


    private $Jeu;

    private $average;

    private $max;

    private $min;

    private $nbComment;

    private $nbCommentTotal;

    private $rankInTheme;

    private $nbRankInTheme;


    public function calculate(){


        $notes = [];
        foreach($this->Jeu->commentaires as $comment){
            $notes[] = $comment->note;
        }


        $this->max = max($notes);
        $this->min = min($notes);
        $this->average = array_sum($notes)/count($notes);


        $this->nbComment = count($notes);


        $this->nbCommentTotal = count(Commentaire::all());

        $Averages  = [];
        foreach(Jeu::all() as $jeu){

            if($jeu->id !== $this->Jeu->id && $jeu->theme->id === $this->Jeu->theme->id){
                $notesJeu = [];
                foreach($jeu->commentaires as $comment){
                    $notesJeu[] = $comment->note;
                }
                $Averages[] = array_sum($notesJeu)/count($notesJeu);
            }
        }

        $Averages[] = $this->average;
        rsort($Averages);
        $this->rankInTheme = array_search($this->average, $Averages) + 1;
        $this->nbRankInTheme = count($Averages);

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
    public function getAverage() : float
    {
        return $this->average;
    }



    public function getMax() : float
    {
        return $this->max;
    }


    public function getMin() :float
    {
        return $this->min;
    }

    /**
     * @return mixed
     */
    public function getNbComment()
    {
        return $this->nbComment;
    }

    /**
     * @return mixed
     */
    public function getNbCommentTotal()
    {
        return $this->nbCommentTotal;
    }

    /**
     * @return mixed
     */
    public function getRankInTheme()
    {
        return $this->rankInTheme;
    }

    /**
     * @return mixed
     */
    public function getNbRankInTheme()
    {
        return $this->nbRankInTheme;
    }
}
