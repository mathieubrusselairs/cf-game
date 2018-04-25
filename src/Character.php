<?php
/**
 * Created by PhpStorm.
 * User: mathieub
 * Date: 2018/04/17
 * Time: 2:56 PM
 */

namespace App;


class Character extends BaseChar
{

    use RandomDeathMessageTrait;
    public $health = 100;
    public $damage = 1;
    public $weapon;
    public $armor;
    public $weaponType;
    public $name;
    public static $amountOfChars;
    const CHARACTER_PRICE = 5;
    const CHARACTER_TYPE = 0;


    public function __construct(Weapon $weapon = null, Armor $armor = null)
    {
        $this->weapon = RandomProvider::getRandomWeapon();
        $this->armor = RandomProvider::getRandomArmor();
        self::$amountOfChars++;
    }

    /**
     * @return int
     */
    public function getHealth() : int
    {
        if($this->health < 0){

            return $this->health = 0;


        }
            return $this->health;

    }

    /**
     * @param int $health
     */
    public function setHealth($health)
    {
            $this->health = $health;
    }

    /**
     * @return int
     */
    public function getDamage() : int
    {
        return $this->damage + $this->weapon->getWeaponDamage();
    }

    /**
     * @param int $damage
     */
    public function setDamage($damage)
    {
        $this->damage = $damage;
    }







    public function setName($name)
    {
        $this->name = RandomProvider::getRandomName() . rand(1,30);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setRandomWeapon()
    {
        $this->weapon = RandomProvider::getRandomWeapon();
    }
    public function setRandomArmor()
    {
        $this->armor = RandomProvider::getRandomArmor();
    }

    public function getWeaponType() : string
    {
        return $this->weapon->getWeaponType();
    }
    public function getArmorType() : string
    {
        return $this->armor->getArmorType();
    }







}