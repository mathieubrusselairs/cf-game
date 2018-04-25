<?php
//belangrijk
declare(strict_types=1);


namespace App;



class Character extends RandomProvider implements PlayerInterface
{
    //alle properties hier private

    use RandomDeathMessageTrait;
    /**
     * @var int
     */
    public $health = 100;
    /**
     * @var int
     */
    public $damage = 1;
    /**
     * @var WeaponInterface
     */
    public $weapon;
    /**
     * @var Armor
     */
    public $armor;
    /**
     * @var string
     */
    public $weaponType;
    /**
     * @var string
     */
    public $name;
    /**
     * @var array
     */
    public $characters;
    /**
     * @var int
     */
    private static $amountOfChars;

    /**
     * @return int
     */
    const CHARACTER_PRICE = 5;
    public static function getAmountOfChars(): int
    {
        return self::$amountOfChars;
    }

    //

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
        //void typehint
    /**
     * @param int $health
     */
    public function setHealth(int $health) : void
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
    public function setDamage($damage) : int
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