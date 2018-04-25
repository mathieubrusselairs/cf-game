<?php

namespace App;
include_once(__DIR__ . '/../autoload.php');
use RandomDeathMessageTrait;
//SETUP

//PROJECT STILL NEEDS THESE::
//- traits
//- callbacks, anonymous functions, closures
//- polymorphism
//
//- extra points for implementing a design pattern
//
//- constants O
//- static methods O
//
//- Error handling X
//- abstract classes X
//- encapsulation X
//- type hinting X
//- inheritance X
//- interfaces X
//- namespaces & autoloading X

//Weapon -> singleton?


$budget = 55;
$turnCounter = 1;
$characterFactory = new CharacterFactory();
$characters = array();

//
//$spectators = function($character) {return $character instanceof Spectator;};
//
//$allFighters = filter($characters, $isFighter, $makesCoffee);

//function filter(array $characters, ...callable $somecrazyCheck) : array
//{
//    $fighters = array();
//
//    foreach($characters as $character){
//        if($somecrazyCheck($character)) {
//            $fighters[] = $character;
//        }
//    }
//
//    return $fighters;
//}

while ($budget > 0) {
    if ($budget < 0) {
        $budget = 0;
    }
//    $characters[] = new Character();
    $characters[] = $characterFactory->getCharacterType(rand(0,1));

    $budget -= (Character::CHARACTER_PRICE * rand(0, 7));
    print('Making Characters -- Budget: ' . $budget . "\n");

}
$fighters = array();
$spectators = array();
$isFighter = function($character) {return $character instanceof Character;};
$isSpectator = function($character) {return $character instanceof Spectator;};
$fighters =  array_filter($characters, $isFighter);
$spectators =  array_filter($characters, $isSpectator);

foreach ($fighters as $character) {
    $randomName = RandomProvider::getRandomName();
    $character->setName(($randomName));
    $decorator = new CharacterDecorator($character->name);
    $decorator->setDecoratedName();
    $decoratedName = $decorator->getDecoratedName();
    $character->setName($decoratedName);




    print(" \n");
    print('Character ' . "\033[33m" . $character->getName() . "\033[0m" . ' stats:' . "\n \n");
    print('    * Damage: ' . $character->getDamage() . " \n");
    print('    * Health: ' . $character->getHealth() . " \n");
    print('    * WeaponType: ' . $character->getWeaponType() . " \n");
    print('    * Armor: ' . $character->getArmorType() . " \n");
    print('    * Regen: ' . ($character->armor->getDefense() / 5) . " \n");

    print("\n");

}
print("Total amount of chars in game: \033[35m" . Character::$amountOfChars . "\033[0m \n");

foreach($spectators as $spectator)
{
    print($spectator->getName() . " is watching you! \n");
}



//END SETUP

sleep(3);
print("\033[36m========== RUMBLE STARTS ========== \n \n\033[0m");


for ($i = 60; $i >= 0; $i--) {
    foreach ($fighters as $character) {
        if ($character->getHealth() <= 0) {
            print($character->getName() . $character->getRandomDeathMessage() . "\n");
            print("\n \033[36m========== RUMBLE OVER ========== \n \n\033[0m");
            exit();
        }


    }
    print("\033[36m-------------ROUND " . $turnCounter . " ------------- \n \n\033[0m");

if(count($fighters) <= 1){
    foreach($fighters as $fighter)
    {
        print($fighter->getName() . " has won the battle! Because he was the only one here... \n");
        exit();
    }
}

if(null == $fighters) { print("NO FIGHTERS!? What a shame... \n");exit(); }
    foreach ($fighters as $character) {
        $randomInteger = rand(0, (count($fighters) - 1));
        $randomChar = $fighters[$randomInteger];

        if ($randomChar->getHealth() <= 0) {
            print($randomChar->getName() . $character->getRandomDeathMessage() . "\n");
            print("\n \033[36m========== RUMBLE OVER ========== \n \n\033[0m");
            exit();
        }
        if ($character->getHealth() <= 0) {
            print("\033[31m" . $character->getName() .$character->getRandomDeathMessage() . "\033[0m \n");
            print("\n \033[36m========== RUMBLE OVER ========== \n \n\033[0m");
            exit();
        }

        print ("\n");
        print("*-*-*-*-*-*- TURN OF '" . $character->getName() . "' -*-*-*-*-*-* \n");


        if ($randomChar == $character) {
            print($character->getName() . " tried attacking himself! Silly goose... \n");
            print($randomChar->getName() . " has \033[31m" . $randomChar->getHealth() . "hp \033[0m left!" . "\n");
        } else {
            if ($character->getHealth() <= 0) {
                print('Dead characters cannot attack! Nice try!' . "\n");
            } else {
                if ($randomChar->getHealth() <= 0) {
                    print($character->getName() . ' tried attacking ' . $randomChar->getName() . "... \n");
                    print('... But ' . $randomChar->getName() . ' is already dead!' . "\n");
                } else {
                    $character->Attack($randomChar);
                    print($character->getName() . " has attacked " . $randomChar->getName() . ' with ' . "\033[33m" . $character->getWeaponType() . "\033[0m" . ' for ' . $character->getDamage() . " damage \n");
                    print($randomChar->getName() . " has \033[31m" . $randomChar->getHealth() . "hp \033[0m left! " . "\n");
                }

            }

        }
        if ($randomChar->getHealth() <= 0) {
            error_log("\033[31m Was not able to attack random character! Target might be dead, or non-existent. \033[0m");
            error_get_last();
        }


        sleep(2);
        print("\n");


    }

    sleep(2);
    $turnCounter++;
}


//Important jeroen stuff
//
//$character1->setWeapon(WeaponsFactory::random());
//
//class WeaponsFactory {
//    /**
//     * @var Randomizer
//     */
//    private $randomizer;
//
//    /**
//     * WeaponsFactory constructor.
//     */
//    public function __construct(Randomizer $randomizer)
//    {
//
//        $this->randomizer = $randomizer;
//    }
//
//    $weapons = [];
//
//    public static function random()
//    {
//        return $this->randomizer->(1, 10);
//    }
//}
//
//new WeaponsFactory(myRandomStub);