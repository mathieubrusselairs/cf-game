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
        $this->character1 = new Character($weapon, $armor);
        $this->character2 = new Character($weapon, $armor);


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
    public function testCharacterCanEquipWeaponToDoMoreDamage()
    {
        $this->character1->weapon = new Weapon("Sword", 50);
        $result = $this->character1->Attack($this->character2);
        $this->assertEquals('49', $result);

    }

    public function testCharacterCanEquipArmorToNegotiateDamage()
    {
        $this->character1->weapon = new Weapon("Sword", 25);
        $this->character2->armor = new Armor("Iron", 25);
        $result = $this->character1->Attack($this->character2);
        $this->assertEquals('99', $result);
    }

    public function testCharacterCanDieSuccessfully()
    {
        $this->character1->weapon = new Weapon("Sword", 99);
        $result = $this->character1->Attack($this->character2);
        $this->assertEquals('0', $result);
    }

    public function testCharactersHealthCanNotGoLowerThan0()
    {
        $this->character1->weapon = new Weapon("Sword", 101);
        $result = $this->character1->Attack($this->character2);
        $this->assertEquals('0', $result);
    }

    public function testCharacterGetsARandomWeapon()
    {
        $result = $this->character1->Attack($this->character2);
        $this->assertEquals('84', $result);
    }

}


