<?php
/**
 * Created by PhpStorm.
 * User: mathieub
 * Date: 2018/04/18
 * Time: 10:01 AM
 */

namespace App;

class Game implements GameInterface
{
    public $character;
    public $characters = [];


    public function __construct($characters)
    {
        foreach($characters as $this->character){
            $this->character = new Character();
            $this->character->getRandomWeapon();
        }

    }

}