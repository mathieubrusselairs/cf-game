<?php

namespace App;
include_once(__DIR__ . '/../autoload.php');
//SETUP

//PROJECT STILL NEEDS THESE::
//- polymorphism
//
//- extra points for implementing a design pattern
//
//- callbacks, anonymous functions, closures O
//- constants O
//- static methods O
//
//- Error handling X
//- traits X
//- abstract classes X
//- encapsulation X
//- type hinting X
//- inheritance X
//- interfaces X
//- namespaces & autoloading X


$budget = 55;
$turnCounter = 1;

//$graveyard = new Characters();
//$spectators = new Characters();
if($turnCounter >= 2) {
    $budget = null;
}
$characters = new Characters();
$game = new Game($characters);
$characters->setUpCharacters();
$game->setUp();
$characters->printStats();


print("Total amount of chars in game: \033[35m" . Character::$amountOfChars . "\033[0m \n");

print("\033[36m========== RUMBLE STARTS ========== \n \n\033[0m");

sleep(2);



for ($i = 60; $i >= 0; $i--) {
    if(count($characters->characters)<= 1){
        print("GY:" . $characters->returnGraveyard() . "\n");
        print("\033[36m========== RUMBLE STARTS ========== \n \n\033[0m");
        exit();
    }

    print("\033[36m-------------ROUND " . $turnCounter . " ------------- \n \n\033[0m");

    $characters->attackRandomTarget();
    print ("\n");
    $characters->generateRandomDeathMessageForEveryDeadCharacter();
    $characters->remove();
    print("\n");
    sleep(2);

    $turnCounter++;
}



//$game = new Game();
//
//$game->setCharacter();
//$game->setOpponent();
//$game->attack();
//$game->output();
//$game = new Game(AttackerIsAlwaysTheWeakest, OpponentIsAlwaysLastAttacker, FreeWeaponForCharClass, FreeStrongestWeapon);
//$game->run();



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