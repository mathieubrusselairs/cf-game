<?php
/**
 * Created by PhpStorm.
 * User: mathieub
 * Date: 2018/04/20
 * Time: 10:23 AM
 */

namespace App;


interface WeaponInterface
{
    public function getWeaponType();
    public function setWeaponType($weapon);
    public function getWeaponDamage();
    public function setWeaponDamage($weapon);
}