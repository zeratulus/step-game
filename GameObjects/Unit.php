<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 22.01.18
 * Time: 17:46
 */

namespace GameObjects;

class Unit
{
    public $id;

    public $image;

    public $hp; //Healt Points
    public $mp; //Mana Points
    public $ap; //Armor Points
    public $armor_type;
    public $speed; // Unit Base Speed

    public $name;

    public function __construct($id, $hp, $mp, $ap, $armor_type, $speed, $image, $name)
    {
        $this->id = $id;
        $this->image = $image;

        $this->hp = $hp;
        $this->mp = $mp;
        $this->ap = $ap;
        $this->armor_type = $armor_type;
        $this->speed = $speed;
        $this->name = $name;
    }

    public function getDamage($damage, $damage_type) {
        if ($this->armor_type == 2) { //Medium Armor
            $full_damage = $damage * $damage_type * 0.75;
            $ap_koef = 0.4;
        } elseif ($this->armor_type == 3) { //Heavy Armor
            $full_damage = $damage * $damage_type * 0.5;
            $ap_koef = 0.6;
        } else { //Light Armor
            $full_damage = $damage * $damage_type;
            $ap_koef = 0.2;
        }

        if ($this->ap > 0) {
            $ap_damage = $full_damage * $ap_koef;
            $hp_damage = $full_damage - $ap_damage;
        } else {
            $hp_damage = $full_damage;
            $ap_damage = 0;
        }

        $this->ap = $this->ap - $ap_damage;
        $this->hp = $this->hp - $hp_damage;
    }

}