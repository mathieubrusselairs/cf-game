<?php

namespace App;
include_once(__DIR__.'/../autoload.php');

//SETUP
$character1 = new Character();
$character2 = new Character();
$character3 = new Character();

$characters[] = $character1;
$characters[] = $character2;
$characters[] = $character3;

$turnCounter = 1;



foreach($characters as $character){
    $randomName = $character->getName();

    print(" \n");
    $character->setName(($randomName));
    print('Character ' . "\033[33m" . $character->getName() ."\033[0m". ' stats:' . "\n \n");
    print('    * WeaponType: ' . $character->getWeaponType() . " \n");
    print('    * Damage: ' . $character->getDamage() . " \n");
    print('    * Health: ' . $character->getHealth() . " \n");
    print('    * Armor: ' . $character->getArmorType() . " \n");
    print('    * Regen: ' . ($character->armor->getDefense()/5) . " \n");

    print("\n");
}
//END SETUP

sleep(3);
print("\033[36m========== RUMBLE STARTS ========== \n \n\033[0m");


for($i = 60; $i >= 0; $i--){
//elk char moet dood ipv laatste/turnchar
    foreach($characters as $character) {
        if($character->getHealth() <= 0) {
            print($character->getName() . " has died! \n");
            print("\n \033[36m========== RUMBLE OVER ========== \n \n\033[0m");
            exit();
        }



    }
    print("\033[36m-------------ROUND " . $turnCounter . " ------------- \n \n\033[0m");


    foreach($characters as $character) {
        $randomInteger = rand(1, (sizeOf($characters)-1));
        $randomChar = $characters[$randomInteger];

        if($randomChar->getHealth() <= 0) {
            print($randomChar->getName() . " has died! \n");
            print("\n \033[36m========== RUMBLE OVER ========== \n \n\033[0m");
            exit();
        }
        if($character->getHealth() <= 0) {
            print("\033[31m" . $character->getName() . " has died!\033[0m \n");
            print("\n \033[36m========== RUMBLE OVER ========== \n \n\033[0m");
            exit();
        }

        print ("\n");
        print("*-*-*-*-*-*- TURN OF '" . $character->getName() . "' -*-*-*-*-*-* \n");

        if ($randomChar == $character) {
            print($character->getName() . " tried attacking himself! Silly goose... \n");
            print($randomChar->getName() . " has \033[31m" . $randomChar->getHealth() . "hp \033[0m left!" ."\n");

        } else {
            if($character->getHealth() <= 0) {
                print('Dead characters cannot attack! Nice try!' . "\n");
            } else {
                if($randomChar->getHealth() <= 0) {
                    print($character->getName(). ' tried attacking ' . $randomChar->getName() . "... \n");
                    print('... But ' . $randomChar->getName() . ' is already dead!' . "\n");
                } else {
                    $character->Attack($randomChar);
                    print($character->getName(). " has attacked " . $randomChar->getName() . ' with ' ."\033[33m". $character->getWeaponType() ."\033[0m".' for ' . $character->getDamage() . " damage \n");
                    print($randomChar->getName() . " has \033[31m" . $randomChar->getHealth() . "hp \033[0m left! " ."\n");
                }

            }

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