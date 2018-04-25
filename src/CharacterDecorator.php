<?php
/**
 * Created by PhpStorm.
 * User: mathieub
 * Date: 2018/04/25
 * Time: 4:05 PM
 */

namespace App;


class CharacterDecorator
{
    public function __construct(string $name)
    {
        $this->name = $name;
    }


    public function setDecoratedName()
    {
        $this->name = "***" . $this->name . rand(0,15) . "***";
    }

    public function getDecoratedName()
    {
        return $this->name;
    }
}