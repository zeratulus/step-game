<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 05.02.18
 * Time: 17:45
 */

namespace GameSystem;

use GameObjects;

class Battle extends DBInstance
{
    public function __construct(DB $db)
    {
        parent::__construct($db);
    }

    public function add()
    {
        $result = $this->db->query('SELECT * FROM battles WHERE id = ' . (int)$battle_id . ' LIMIT 1');
    }

    public function load($battle_id)
    {
        $result = $this->db->query('SELECT * FROM battles WHERE id = ' . (int)$battle_id . ' LIMIT 1');
        return $result->row;
    }

    public function update($battle_id, GameObjects\Unit $player, GameObjects\Unit $enemy)
    {
        $this->db->query('UPDATE battles SET player_id=' . $player->id . ', p_hp=' . $player->hp . ', p_ap=' . $player->ap . ', p_mp=' . $player->mp . ', e_hp=' . $enemy->hp . ', e_ap=' . $enemy->ap . ', e_mp=' . $enemy->mp . ', enemy_id=' . $enemy->id . ' WHERE id=' . (int)$battle_id);
    }

    public function delete($battle_id)
    {
        $this->db->query('DELETE FROM battles WHERE id = ' . (int)$battle_id);
    }

    public function getBattle($id){
        $result = $this->db->query('SELECT * FROM battles WHERE id = '.(int)$id.' LIMIT 1');
        return $result->row;
    }

    public function enemy($enemy_id)
    {
        $result = $this->db->query('SELECT * FROM enemies WHERE enemy_id = ' . (int)$enemy_id . ' LIMIT 1');
        return $result->row;
    }

    public function getRandomEnemy()
    {
        $results = $this->db->query('SELECT MIN(enemy_id) as minimum, MAX(enemy_id) as maximum FROM enemies');
        $enemy_id = rand($results->row['minimum'], $results->row['maximum']);
        return $this->enemy($enemy_id);
    }

}