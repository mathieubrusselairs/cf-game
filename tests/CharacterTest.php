<?php

namespace App;

include_once(__DIR__.'/../autoload.php');

use PHPUnit\Framework\TestCase;

class CharacterTest extends TestCase
{
    /**
     * @var Character
     */
    public $character1;
    /**
     * @var
     */
    public $character2;
    /**
     * @var
     */
    public $result;
    /**
     * @var
     */
    public $weapon;
    /**
     * @var
     */
    public $armor;

    /**
     *
     */
    public function setUp()
    {
        $weapon = new Weapon();
        $armor = new Armor();
        $this->character1 = new Character();
        $this->character2 = new Character();
        $characters[] = $this->character1;
        $characters[] = $this->character2;


    }

    /**
     *
     */
    public function testCharacterCanAttackOpponent()
    {

        $result = $this->character1->Attack($this->character2);
        $expectedResult = $this->character2->health < 99;
        $this->assertEquals($expectedResult, $result);
    }

    /**
     * Test is deprecated (Characters get random weapons)
     */
//    public function testCharacterCanDoMoreThanJust1Damage()
//    {
//        $this->character1->Attack($this->character2);
//        $result = $this->character1->Attack($this->character2);
//        $this->assertEquals('98', $result);
//    }

    /**
     *
     */


    public function testCharacterCanEquipArmorToNegotiateDamageAndUseWeaponToDealExtraDamage()
    {
        $this->character1->weapon = new Weapon("Sword", 25);
        $this->character2->armor = new Armor("Iron", 12.5);
        $result = $this->character1->Attack($this->character2);
        $this->assertEquals('76.5', $result);
    }

    public function testCharacterCanDieSuccessfully()
    {
        $this->character1->weapon = new Weapon("Sword", 99);
        $this->character2->armor = new Armor("Iron", 0);
        $result = $this->character1->Attack($this->character2);
        $this->assertEquals('0', $result);
    }

    public function testCharactersHealthCanNotGoLowerThan0()
    {
        $this->character1->weapon = new Weapon("Sword", 500);
        $result = $this->character1->Attack($this->character2);
        $this->assertEquals('0', $result);
    }


}


