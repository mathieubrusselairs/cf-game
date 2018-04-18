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
    public $turns = [];

    public function setUp()
    {
        $this->game = new Game($this->character1, $this->character2);
    }
    public function testGameStarts()
    {
        if($this->game->timeLeft <= 60){
            $this->assertEquals(true, true);
        } else {
            $this->assertEquals(false, true);
        };

    }


}
