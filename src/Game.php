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

    public $budget;

    public function __construct(array $characters)
    {
        foreach ($characters as $this->character) {
            $this->character = new Character();
        }

    }

}