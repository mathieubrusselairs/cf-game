<?php
/**
 * Created by PhpStorm.
 * User: mathieub
 * Date: 2018/04/19
 * Time: 3:14 PM
 */

namespace App;


abstract class AbstractWeapon
{

    //Volledige functionaliteit -> indien Weapon.php ooit moest veranderen, heb ik
    //
    public $weapon;
    public $weaponType;
    public $weaponDamage;

    public abstract function getWeaponType();
    public abstract function setWeaponType($weaponType);
    public abstract function getWeaponDamage();
    public abstract function setWeaponDamage($weaponDamage);
}