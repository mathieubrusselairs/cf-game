<?php
/**
 * Created by PhpStorm.
 * User: mathieub
 * Date: 2018/04/18
 * Time: 10:01 AM
 */

namespace App;

class Game
{
    public $character1;
    public $character2;
    public $weapon;
    public $armor;
    public $timeLeft;
    public $opponent;
    public $turnCounter = 0;
    public $turnsArray = [];
    public $myTurn;


    public function __construct(Character $character1, Character $character2)
    {
        $this->character1 = new Character();
        $character1->getRandomWeapon();
        $this->character2 = new Character();
        $character2->getRandomWeapon();
    }

    public function startGame($character1, $character2)
    {

    }

    public function timeLeft()
    {
        $this->timeLeft = time() + 60;
        if($this->timeLeft <= 0 || $this->character1->Attack($this->opponent) || $this->character2->Attack($this->opponent)){
            $this->turnCounter += 1;
        }
    }

    //Gaat voor allebij hetzelfde zijn he godverdekke
    public function turnSwitch()
    {
        if($this->character1 !== $this->opponent){
            if($this->turnCounter % 2 == 0) {
                $this->myTurn = true;
            }
        }
    }
}