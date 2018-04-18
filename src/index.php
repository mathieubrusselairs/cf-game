<?php

namespace App;
include_once(__DIR__.'/../autoload.php');

print('Hello from Index' . "\n \n");
$character1 = new Character();
$character2 = new Character();
new Game($character1, $character2);

$character1->setRandomWeapon();
print('Character 1 stats:' . "\n \n");
print('    * WeaponType: ' . $character1->getWeaponType() . " \n");
print('    * Damage: ' . $character1->getDamage() . " \n");
print('    * Health: ' . $character1->getHealth() . " \n");

print('------------------' . "\n \n");

$character2->setRandomWeapon();
print('Character 2 stats:' . "\n \n");
print('    * WeaponType: ' . $character2->getWeaponType() . " \n");
print('    * Damage: ' . $character2->getDamage() . " \n");
print('    * Health: ' . $character2->getHealth() . " \n");

print("\n");

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