<?php
/**
 * Created by PhpStorm.
 * User: mathieub
 * Date: 2018/04/19
 * Time: 4:05 PM
 */

namespace App;


trait RandomDeathMessageTrait
{

    public function getRandomDeathMessage(Character $character){
        $deathMessages = array(
            function() use ($character) {
                return $character->getName() . " has seen the light of day!";
            },
            function() use ($character) {
                return $character->getName() . " closed his eyes for good this time!" ;
            },
            function() use ($character)
            {
                return $character->getName() . " choked on a piece of lego!";
            },
            function() use ($character)
            {
                return $character->getName() . " has been deprecated in Symfony 4.0!";
            });


        return $deathMessage = $deathMessages[rand(0,count($deathMessages)-1)]();

    }

}