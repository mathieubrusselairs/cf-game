<?php
/**
 * Created by PhpStorm.
 * User: mathieub
 * Date: 2018/04/17
 * Time: 2:56 PM
 */

namespace App;



class Character implements PlayerInterface
{
    public $health = 100;
    public $damage = 1;
    public $weapon;
    public $armor;
    public $weaponType;
    public $name;

    public function __construct(Weapon $weapon = null, Armor $armor = null)
    {
        $this->weapon = $this->getRandomWeapon();
        $this->armor = $this->getRandomArmor();
    }

    /**
     * @return int
     */
    public function getHealth()
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
        $opponent->setHealth($opponent->getHealth() - $this->getDamage() + ( $opponent->armor->getDefense() / 5));
        return $opponent->getHealth();
    }



    public function setName($name)
    {
        $this->name = $this->getRandomName() . rand(1,30);
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

    public function getWeaponType()
    {
        return $this->weapon->getWeaponType();
    }
    public function getArmorType()
    {
        return $this->armor->getArmorType();
    }

    public function getRandomWeapon()
    {
        $random = rand(1,5);
        switch($random) {
            case 1 :
                return new Weapon('Stick and Stone to Break a Bone', rand(10,20));
                break;
            case 2 :
                return new Weapon('Very Rusty Hatchet', rand(20, 40));
                break;
            case 3 :
                return new Weapon('Arrow Shooter', rand(40, 50));
                break;
            case 4 :
                return new Weapon('Half a Pizza Slice', rand(50, 70));
                break;
            case 5 :
                return new Weapon('Strong Rubber Chiken', rand(70, 100));
                break;
        }
    }

    public function getRandomArmor()
    {
        $random = rand(1,5);
        switch($random) {
            case 1 :
                return new Armor('Wooden Shield', rand(10,20));
                break;
            case 2 :
                return new Armor('Iron Helmet', rand(20, 40));
                break;
            case 3 :
                return new Armor('a Leaf', rand(40, 50));
                break;
            case 4 :
                return new Armor('5 Weeks Old Pizza', rand(50, 70));
                break;
            case 5 :
                return new Armor('Platinum', rand(70, 100));
                break;
        }
    }

    public function getRandomName()
    {
        $random = rand(1,10);
        switch($random) {
            case 1 :
                return 'Jeffrey';
                break;
            case 2 :
                return 'Shwanslapke';
                break;
            case 3 :
                return 'dat chiken';
                break;
            case 4 :
                return 'isaaque';
                break;
            case 5 :
                return 'shtijn';
                break;
            case 6 :
                return 'walter';
                break;
            case 6 :
                return 'jerone';
                break;
            case 7 :
                return 'gijs';
                break;
            case 8 :
                return 'gotye';
                break;
            case 9 :
                return 'waterboye';
                break;
            case 10 :
                return 'aqua';
                break;

        }
    }





}