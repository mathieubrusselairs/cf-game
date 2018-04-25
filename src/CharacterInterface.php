<?php
/**
 * Created by PhpStorm.
 * User: mathieub
 * Date: 2018/04/25
 * Time: 1:50 PM
 */

namespace App;


interface CharacterInterface
{
    public function Attack(Character $opponent);
}