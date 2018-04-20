<?php
/**
 * Created by PhpStorm.
 * User: mathieub
 * Date: 2018/04/18
 * Time: 11:05 AM
 */

namespace App;


class Weapon extends AbstractWeapon implements WeaponInterface
{
    public $weaponType;
    public $weaponDamage;

    public function __construct($weaponType = null, $weaponDamage = null)
    {
        $this->weaponType = $weaponType;
        $this->weaponDamage = $weaponDamage;
    }

    /**
     * @return mixed
     */
    public function getWeaponType()
    {
        return $this->weaponType;
    }

    /**
     * @param mixed $weaponType
     */
    public function setWeaponType($weaponType)
    {
        $this->weaponType = $weaponType;
    }

    /**
     * @return mixed
     */
    public function getWeaponDamage()
    {
        return $this->weaponDamage;
    }

    /**
     * @param mixed $weaponDamage
     */
    public function setWeaponDamage($weaponDamage)
    {
        $this->weaponDamage = $weaponDamage;
    }
}