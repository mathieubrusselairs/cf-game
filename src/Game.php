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
    public $character;
    public $weapon;
    public $armor;
    public $timeLeft;
    public $opponent;
    public $turnCounter = 0;
    public $turnsArray = [];
    public $myTurn;
    public $characters = [];


    public function __construct($characters)
    {
        foreach($this->characters as $this->character){
            $this->character = new Character();
            $this->character->getRandomWeapon();
        }

    }

    public function startGame($characters)
    {

    }

    public function timeLeft()
    {
        $this->timeLeft = time() + 60;
        if($this->timeLeft <= 0 || $this->character->Attack($this->opponent)){
            $this->turnCounter += 1;
        }
    }

    //Gaat voor allebij hetzelfde zijn he godverdekke
    public function turnSwitch()
    {
        if($this->character !== $this->opponent){
            if($this->turnCounter % 2 == 0) {
                $this->myTurn = true;
            }
        }
    }
}