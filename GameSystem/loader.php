<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 02.02.18
 * Time: 17:51
 */

namespace GameSystem;

class Loader extends DBInstance
{
    public function __construct(DB $db)
    {
        parent::__construct($db);
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