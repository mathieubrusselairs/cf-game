<?php
/**
 * Created by PhpStorm.
 * User: mathieub
 * Date: 2018/04/20
 * Time: 11:09 AM
 */

namespace App;


class Characters
{
    public $graveyard = [];
    public $deadGuyArray = [];
    public $characters = [];
    protected $index = 0;
    private $budget = 55;
    private $randomChar;


    public function setUpCharacters()
    {
        while ($this->budget > 0) {
            if ($this->budget < 0) {
                $this->budget = 0;
            }
            $character = new Character();
            array_push($this->characters, $character);
            Character::$amountOfChars++;
            $this->budget -= (Character::CHARACTER_PRICE * rand(0, 7));
            print('Making Characters -- Budget: ' . $this->budget . "\n");
        }




    }
    public function printStats()
    {
        foreach ($this->characters as $character) {
            $randomName = StaticRandomProvider::generateRandomName();

            $character->setName($randomName);

            print(" \n");
            print('Character ' . "\033[33m" . $character->getName() . "\033[0m" . ' stats:' . "\n \n");
            print('    * WeaponType: ' . $character->getWeaponType() . " \n");
            print('    * Damage: ' . $character->getDamage() . " \n");
            print('    * Health: ' . $character->getHealth() . " \n");
            print('    * Armor: ' . $character->getArmorType() . " \n");
            print('    * Regen: ' . ($character->armor->getDefense() / 5) . " \n");

            print("\n");

        }

    }

    public function remove()
    {
        foreach($this->characters as $character){
            if($character->getHealth() <= 0){
                $this->deadGuyArray[] = $character;
                $this->graveyard[] = array_diff_key($this->deadGuyArray, $this->characters);
                unset($this->characters, $character);
            }
        }
//        $this->graveyard = array_walk($this->characters, function($index) {
//            if($this->characters[$index]->getHealth() <= 0){
//                $this->graveyard = $this->characters[$index];
//            }
//        });

    }

    public function returnGraveyard()
    {
        foreach($this->graveyard as $deadGuy) {
            $deadGuy->getName();
        }
    }

    public function generateRandomDeathMessageForEveryDeadCharacter()
    {
        foreach ($this->characters as $character) {
            if ($character->getHealth() <= 0) {
                print($character->getRandomDeathMessage($character) . "\n");
            }
        }
    }

    public function pickRandomTarget()
    {
        if(count($this->characters) > 1){
            $randomChar = $this->characters[rand(0, (count($this->characters)-1))];
            if ($randomChar->getHealth() <= 0) {
                error_log("\033[31m Was not able to attack random character! Target might be dead, or non-existent. \033[0m");
                error_get_last();
            } else {
                $randomChar = $this->characters[rand(0, (count($this->characters)-1))];
                return $randomChar;
            }
        }
    }

    public function attackRandomTarget()
    {

        $this->randomChar = $this->pickRandomTarget();
        foreach($this->characters as $character) {
            print("*-*-*-*-*-*- TURN OF '" . $character->getName() . "' -*-*-*-*-*-* \n");
            if($character === $this->randomChar) {

                print($character->getName() . " tried attacking himself! Silly goose... \n");
                print($this->randomChar->getName() . " has \033[31m" . $this->randomChar->getHealth() . "hp \033[0m left!" . "\n");

            } else {
                if ($character->getHealth() <= 0) {
                    print('Dead characters cannot attack! Nice try!' . "\n");

                } else {
                    if ($this->randomChar->getHealth() <= 0) {
                        print($character->getName() . ' tried attacking ' . $this->randomChar->getName() . "... \n");
                        print('... But ' . $this->randomChar->getName() . ' is already dead!' . "\n");

                    } else {
                        $character->Attack($this->randomChar);
                        print($character->getName() . " has attacked " . $this->randomChar->getName() . ' with ' . "\033[33m" . $character->getWeaponType() . "\033[0m" . ' for ' . $character->getDamage() . " damage \n");
                        print($this->randomChar->getName() . " has \033[31m" . $this->randomChar->getHealth() . "hp \033[0m left! " . "\n");
                    }

                }

            }
            sleep(2);
            print("\n");
        }
    }

}
