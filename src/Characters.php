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
        foreach($this->characters as $index => $character){
            if($character->getHealth() <= 0) {
                array_push($this->graveyard, $character);
//                $this->graveyard = array_diff_assoc($this->deadGuyArray, array($character));

                unset($this->characters[$index], $character);
            }
            $this->characters = array_values($this->characters);
        }
    }

    public function returnGraveyard()
    {
        print("It is a bleak day for our brave soldiers: \n");
        foreach($this->graveyard as $deadGuy) {
            print($deadGuy->getName() . "\n");
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
            if (!isset($randomChar)) {
                error_log("\033[31m Was not able to attack random character! Target might be dead, or non-existent. \033[0m");
                error_get_last();
                $this->randomChar = $this->characters[rand(0, (count($this->characters)-1))];
            } else {
                return $randomChar;
            }
        }
    }

    public function attackRandomTarget()
    {
        foreach($this->characters as $character) {
            $this->randomChar = $this->pickRandomTarget();
            print("*-*-*-*-*-*- TURN OF '" . $character->getName() . "' -*-*-*-*-*-* \n");
            if($character === $this->randomChar) {

                print($character->getName() . " tried attacking himself! Silly goose... \n");
                print($this->randomChar->getName() . " has \033[31m" . $this->randomChar->getHealth() . "hp \033[0m left!" . "\n");

            } else {
                if ($character->getHealth() <= 0) {
                    print('Dead characters cannot attack! Nice try!' . "\n");

                } else {
                    if ($this->randomChar->getHealth() <= 0 || !isset($this->randomChar)) {
                        print($character->getName() . ' tried attacking ' . $this->randomChar->getName() . "... \n");
                        print('... But ' . $this->randomChar->getName() . ' is already dead, or nonexistant!' . "\n");
                    } else {
                        if($this->randomChar->getHealth() > 0){
                            $character->Attack($this->randomChar);
                            print($character->getName() . " has attacked " . $this->randomChar->getName() . ' with ' . "\033[33m" . $character->getWeaponType() . "\033[0m" . ' for ' . $character->getDamage() . " damage \n");
                            print($this->randomChar->getName() . " has \033[31m" . $this->randomChar->getHealth() . "hp \033[0m left! " . "\n");
                        } else {
                            error_log("Target not found! Exiting...");
                            error_get_last();

                        }
                    }

                }

            }
            sleep(1);
            print("\n");
        }
    }

}
