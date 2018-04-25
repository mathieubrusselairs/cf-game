<?php
/**
 * Created by PhpStorm.
 * User: mathieub
 * Date: 2018/04/25
 * Time: 1:53 PM
 */

namespace App;
//factory design pattern

class CharacterFactory
{
    public function getCharacterType(int $characterType){
        if(Character::CHARACTER_TYPE === null || Spectator::CHARACTER_TYPE === null){
            return null;
        }
        if($characterType == 0){
            return new Character();
        }
        if($characterType == 1){
            return new Spectator();
        }
        return null;
    }
}