<?php
/**
 * Created by PhpStorm.
 * User: mathieub
 * Date: 2018/04/18
 * Time: 11:05 AM
 */

namespace App;


class Armor
{
    public $armorType;
    public $defense;

    public function __construct($armorType = null, $defense = null)
    {
        $this->armorType = $armorType;
        $this->defense = $defense;
    }

    /**
     * @return mixed
     */
    public function getArmorType(): string
    {
        return $this->armorType;
    }

    /**
     * @param mixed $armorType
     */
    public function setArmorType($armorType)
    {
        $this->armorType = $armorType;
    }

    /**
     * @return mixed
     */
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * @param mixed $defense
     */
    public function setDefense($defense)
    {
        $this->defense = $defense;
    }
}