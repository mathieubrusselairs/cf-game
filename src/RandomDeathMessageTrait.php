<?php
/**
 * Created by PhpStorm.
 * User: mathieub
 * Date: 2018/04/19
 * Time: 4:05 PM
 */

namespace App;

//DEAD CONTENT
//
//DOESNT TWERK
trait RandomDeathMessageTrait
{
// Store 3 anonymous functions in an array

    public function getRandomDeathMessage(){
        $deathMessages = array(
            function() {
                return print(" has seen the light of day!");
            },
            function() {
                return print(" closed his eyes for good this time!") ;
            },
            function()
            {
                return print(" choked on a piece of lego!");
            });


        return $deathMessages[1];

    }

}