<?php
/**
 * Created by PhpStorm.
 * User: mathieub
 * Date: 2018/04/25
 * Time: 3:39 PM
 */

namespace App;


class BaseChar implements CharacterInterface
{
//Composite Design Pattern! (both objects that extend basechar have access to the Attack functionality)

    public function Attack($opponent)
    {
        $opponent->setHealth($opponent->getHealth() - $this->getDamage() + ( $opponent->armor->getDefense() / 5));
        return $opponent->getHealth();
    }


}