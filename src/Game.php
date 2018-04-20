<?php
/**
 * Created by PhpStorm.
 * User: mathieub
 * Date: 2018/04/18
 * Time: 10:01 AM
 */

namespace App;

class Game implements GameInterface
{

    public $randomChar;

    protected $budget = 55;

    /**
     * Game constructor.
     */
//    public function __construct(CharStrategy $attackerStrategy, CharStrategy $opponentStrategy, WeaponStrategy $a, WeaponStrategy $o)
//    {
//    }


    public function __construct()
    {


    }

    public function setUp()
    {


        //print stats for each character in array


    }



            //NOT DEES FUNCTION
//            if ($randomChar->getHealth() <= 0) {
//                print($randomChar->getRandomDeathMessage($randomChar) . "\n");
//            }
//            if ($character->getHealth() <= 0) {
//                print("\033[31m" . $character->getRandomDeathMessage($character) . "\033[0m \n");
//            }

//
//    public function startnewRound()
//    {
//        $this->attacker(ChooseRandomPlayerStrategy::player());
//        $this->attacker->equipWeapon(GoesWithClassAndIsFreeWeaponStrategy());
//        $this->chooseOpponent(ChooseNotWeakestPlayerStrategy::player());
//
//        $this->fight();
//
//        $this->endRound();
//    }
//
//    private function endRound()
//    {
//        $this->moveDeadPeopleToGraveyard();
//        $this->decideIfGameIsOver();
//    }
}