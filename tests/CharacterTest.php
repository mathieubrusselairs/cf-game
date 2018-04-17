<?php
/**
 * Created by PhpStorm.
 * User: mathieub
 * Date: 2018/04/17
 * Time: 2:56 PM
 */

use PHPUnit\Framework\TestCase;

class Character
{
    public $weapons = ['Bow'=>5, 'Sword'=>10, 'Spear'=>20, 'Bazooka'=>50];
    public $armor = ['Iron'=>10, 'Steel'=>20, 'Platinum'=>50];
    public $health = 100;
    public $damage = 1;

    public function Attack(Character $opponent)
    {
        $opponent->health -= $this->damage;
        return $opponent->health;
    }
}

class CharacterTest extends TestCase
{
    protected $character1;
    protected $character2;
    protected $result;

    public function setUp()
    {
        $this->character1 = new Character();
        $this->character2 = new Character();
    }

    public function testCharacterCanAttackOpponent()
    {
        $result = $this->character1->Attack($this->character2);
        $this->assertEquals('99', $result);
    }
}


