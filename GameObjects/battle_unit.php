<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 22.01.18
 * Time: 18:00
 */

namespace GameObjects;

class BattleUnit extends Unit {
    protected $damage;
    protected $damage_type;

    public function __construct($id, $hp, $mp, $ap, $armor_type, $speed, $image, $name, $damage, $damage_type) {
        parent::__construct ($id, $hp, $mp, $ap, $armor_type, $speed, $image, $name);
        $this->damage = $damage;
        $this->damage_type = $damage_type;
    }

    public function makeDamage(Unit $unit) {
        $unit->getDamage($this->damage, $this->damage_type);
    }

}