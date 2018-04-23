<?php
/**
 * Created by PhpStorm.
 * User: mathieub
 * Date: 2018/04/17
 * Time: 2:56 PM
 */

namespace App;



class Character extends RandomProvider implements PlayerInterface
{

    use RandomDeathMessageTrait;
    public $health = 100;
    public $damage = 1;
    public $weapon;
    public $armor;
    public $weaponType;
    public $name;
    public $characters;
    public static $amountOfChars;
    const CHARACTER_PRICE = 5;


    public function __construct(WeaponInterface $weapon = null, Armor $armor = null)
    {
        if(isset($weapon)){
            $this->weapon = $weapon;
        } else {
            $this->weapon = $this->getRandomWeapon();
        }
        if(isset($armor)){
            $this->armor = $armor;
        } else {
            $this->armor = $this->getRandomArmor();
        }


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



    public function Attack(Character $opponent = null) :int
    {
        $opponent->setHealth($opponent->getHealth() - $this->getDamage() + ( $opponent->armor->getDefense() / 5));
        return $opponent->getHealth();


    }

    public function setName($name)
    {
        $this->name = StaticRandomProvider::generateRandomName();
    }

    public function getName()
    {
        return $this->name;
    }

    public function setRandomWeapon()
    {
        $this->weapon = $this->getRandomWeapon();
    }
    public function setRandomArmor()
    {
        $this->armor = $this->getRandomArmor();
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