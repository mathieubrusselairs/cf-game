<?php
/**
 * Created by PhpStorm.
 * User: mathieub
 * Date: 2018/04/25
 * Time: 1:55 PM
 */

namespace App;


class Spectator implements PlayerInterface
{
    private $randomArmor;
    private $randomWeapon;
    private $name;
    const CHARACTER_TYPE = 1;

    public function getHealth()
    {
        return 1;
    }

    public function getDamage()
    {
        return 0;
    }

    public function getRandomArmor()
    {
        return $this->randomArmor;
    }

    public function getRandomWeapon()
    {
        return $this->randomWeapon;
    }

    public function getName()
    {
        return "Spectator" . rand(0,5);
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function Attack() : void
    {
        print("Spectators can only watch!");
    }



}