<?php
/**
 * Created by PhpStorm.
 * User: mathieub
 * Date: 2018/04/19
 * Time: 2:56 PM
 */

namespace App;


class RandomProvider
{
    public function getRandomWeapon()
    {
        $random = rand(1,5);
        switch($random) {
            case 1 :
                return new Weapon('Stick and Stone to Break a Bone', rand(10,20));
                break;
            case 2 :
                return new Weapon('Very Rusty Hatchet', rand(20, 40));
                break;
            case 3 :
                return new Spear('Jesus Piercer', rand(40, 50));
                break;
            case 4 :
                return new Weapon('Half a Pizza Slice', rand(50, 70));
                break;
            case 5 :
                return new Weapon('Strong Rubber Chiken', rand(70, 100));
                break;
        }
    }

    public function getRandomArmor()
    {
        $random = rand(1,5);
        switch($random) {
            case 1 :
                return new Armor('Wooden Shield', rand(10,20));
                break;
            case 2 :
                return new Armor('Iron Helmet', rand(20, 40));
                break;
            case 3 :
                return new Armor('a Leaf', rand(40, 50));
                break;
            case 4 :
                return new Armor('5 Weeks Old Pizza', rand(50, 70));
                break;
            case 5 :
                return new Armor('Platinum', rand(70, 100));
                break;
        }
    }

    public function getRandomName()
    {
        $random = rand(1,10);
        switch($random) {
            case 1 :
                return 'Jeffrey';
                break;
            case 2 :
                return 'Shwanslapke';
                break;
            case 3 :
                return 'dat chiken';
                break;
            case 4 :
                return 'isaaque';
                break;
            case 5 :
                return 'shtijn';
                break;
            case 6 :
                return 'walter';
                break;
            case 6 :
                return 'jerone';
                break;
            case 7 :
                return 'gijs';
                break;
            case 8 :
                return 'gotye';
                break;
            case 9 :
                return 'waterboye';
                break;
            case 10 :
                return 'aqua';
                break;

        }
    }
}