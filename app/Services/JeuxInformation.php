<?php


namespace App\Services;


use App\Models\Commentaire;
use App\Models\Jeu;
use phpDocumentor\Reflection\Types\Float_;

class JeuxInformation{


    private $jeu;

    private $average = 0;

    private $max = 0;

    private $min = 0;

    private $nbComment = 0;

    private $nbCommentTotal = 0;

    private $rankInTheme = 0;

    private $nbRankInTheme = 0;

    private $triComments = 0;


    public function calculate(){


        $notes = [];
        foreach($this->jeu->commentaires as $comment){
            $notes[] = $comment->note;
        }
        if(count($notes) !== 0){


            $this->max = max($notes);
            $this->min = min($notes);
            $this->average = array_sum($notes) / count($notes);


            $this->nbComment = count($notes);


            $this->nbCommentTotal = count(Commentaire::all());

            $Averages = [];
            foreach(Jeu::all() as $jeu){

                if($jeu->id !== $this->jeu->id && $jeu->theme->id === $this->jeu->theme->id){
                    $notesJeu = [];
                    foreach($jeu->commentaires as $comment){
                        $notesJeu[] = $comment->note;
                    }
                    if(count($notesJeu) !== 0){
                        $Averages[] = array_sum($notesJeu) / count($notesJeu);
                    }
                }
            }

            $Averages[] = $this->average;
            rsort($Averages);
            $this->rankInTheme = array_search($this->average, $Averages) + 1;
            $this->nbRankInTheme = count($Averages);
        }
    }

    /**
     * @return mixed
     */

    public function getJeu()
    {
        return $this->jeu;
    }

    /**
     * @param mixed $jeu
     */
    public function setJeu(Jeu $jeu)
    {
        $this->jeu = $jeu;
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

    /**
     * @param int $triComments
     */
    public function setTriComments(int $triComments): void {
        $this->triComments = $triComments;
    }



    public function getCommentaires() {
        if (! $this->triComments)
            return $this->jeu->commentaires;
        return $this->jeu->commentaires()->orderByDesc('date_com')->get();
    }
}
