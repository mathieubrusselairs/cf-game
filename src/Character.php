<?php
/**
 * Created by PhpStorm.
 * User: mathieub
 * Date: 2018/04/17
 * Time: 2:56 PM
 */

namespace App;



class Character
{
    public $health = 100;
    public $damage = 1;
    public $weapon;
    public $armor;

    public function __construct(Weapon $weapon = null, Armor $armor = null)
    {
        $this->weapon = new Weapon();
        $this->armor = new Armor();
    }

    /**
     * @return int
     */
    public function getHealth()
    {
        if($this->health <= 0){
            return $this->health = 0;
        } else {
            return $this->health;
        }
    }

    /**
     * @param int $health
     */
    public function setHealth($health)
    {
            $this->health = $health + $this->armor->getDefense();
    }

    /**
     * @return int
     */
    public function getDamage()
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



    public function Attack(Character $opponent)
    {

        $opponent->setHealth($opponent->getHealth() - $this->getDamage());
        return $opponent->getHealth();
    }

    public function setRandomWeapon()
    {
        $this->weapon = $this->getRandomWeapon();
    }

    public function getRandomWeapon()
    {
        $random = rand(1,5);
        switch($random) {
            case 1 :
                return new Weapon('Sword', rand(30, 40));
                break;
            case 2 :
                return new Weapon('Axe', rand(45, 60));
                break;
            case 3 :
                return new Weapon('Bow', rand(15, 25));
                break;
            case 4 :
                return new Weapon('Bazooka', rand(75, 95));
                break;
            case 5 :
                return new Weapon('ruber ciken', rand(15, 15));
                break;
        }
    }




}