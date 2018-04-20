<?php
/**
 * Created by PhpStorm.
 * User: mathieub
 * Date: 2018/04/20
 * Time: 9:35 AM
 */

namespace App;


class StaticRandomProvider
{


    static public function getRandomFirstName(){
        $random = rand(0,4);

        switch($random) {
            case 1 :
                return 'Shtijn ';
                break;
            case 2 :
                return 'Jerone ';
                break;
            case 3 :
                return 'Isaque ';
                break;
            case 4 :
                return 'Ghijsh ';
                break;
            case 5 :
                return 'Thim ';
                break;
        }
    }

    static public function getRandomLastName(){
        $random = rand(0,4);

        switch($random) {
            case 1 :
                return 'The Great';
                break;
            case 2 :
                return 'The Destroyer';
                break;
            case 3 :
                return 'The Heavy';
                break;
            case 4 :
                return 'The Great';
                break;
            case 5 :
                return 'The Pretty';
                break;
        }
    }

    static public function generateRandomName() {
        return self::getRandomFirstName() . self::getRandomLastName();
    }

}

