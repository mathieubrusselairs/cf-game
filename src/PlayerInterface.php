<?php
/**
 * Created by PhpStorm.
 * User: mathieub
 * Date: 2018/04/19
 * Time: 1:55 PM
 */

namespace App;


interface PlayerInterface
{

    public function getHealth();
    public function getDamage();

    public function getRandomArmor();
    public function getRandomWeapon();

    public function getName();
    public function setName($name);

}