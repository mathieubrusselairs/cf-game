<?php
/**
 * Created by PhpStorm.
 * User: mathieub
 * Date: 2018/04/18
 * Time: 2:49 PM
 */

namespace App;


use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public $character1;
    public $character2;
    public $character3;
    public $characters = [];
    public $game;



    public function setUp()
    {
        $this->character1 = new Character();
        $this->character2 = new Character();
        $this->character3 = new Character();
        $this->characters[] = $this->character1;
        $this->characters[] = $this->character2;
        $this->characters[] = $this->character3;
        $this->game = new Game($this->characters);

    }


    public function testCanAddMoreThan3PlayersToTheGame()
    {
        $expectedArrayCount = 4;
        $characterExtra = new Character();
        $this->characters[] = $characterExtra;

        $result = count($this->characters);

        $this->assertEquals($expectedArrayCount, $result);

    }

}
