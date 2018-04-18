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
    }

    public function turnSwitch()
    {
        if($this->timeLeft <= 0 || $this->character1->Attack($this->opponent) || $this->character2->Attack($this->opponent)){
            return
        }

    }
}