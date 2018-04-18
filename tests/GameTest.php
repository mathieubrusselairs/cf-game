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
    public $turns = [];

    public function setUp()
    {
        $this->game = new Game($this->characters);
        $this->characters[] = [$this->character1, $this->character2];
    }
    public function testGameStarts()
    {
        if($this->game->timeLeft <= 60){
            $this->assertEquals(true, true);
        } else {
            $this->assertEquals(false, true);
        };

    }

    public function testCanAddMoreThen2PlayersToTheGame()
    {
        $expectedArrayCount = 3;
        $characterExtra = new Character();
        $this->characters[] = $characterExtra;
        $result = array_count_values($this->characters[]);
        $this->assertEquals($expectedArrayCount, $result);
    }

}
