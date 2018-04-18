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
    public $game;

    public function setUp()
    {
        $this->game = new Game($this->character1, $this->character2);
    }
    public function testGameStarts()
    {
        $this->assertEquals('', );
    }

    public function testTimeRunsOut()
    {
        $expectedResult = time()+60;
        $this->assertEquals($expectedResult, );
    }
}
