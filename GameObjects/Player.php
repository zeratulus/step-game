<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 09.02.18
 * Time: 18:05
 */

namespace GameObjects;

use GameSystem\DB;
use GameSystem\DBInstance;

class Player extends DBInstance
{
    public $isLogged;
    public $errors = array();

    public function __construct(DB $db)
    {
         parent::__construct($db);
         $this->isLogged = false;
    }

    public function auth($login, $password) {
        $results = $this->db->query('SELECT * FROM players WHERE login = \'' . $login . '\' LIMIT 1');

        if ($results->num_rows) {
            $hash = md5($password . $results->row['salt']);
            if ($results->row['hash'] == $hash) {
                $this->isLogged = true;
                return true;
            } else {
                $this->isLogged = false;
                $this->errors[] = 'Wrong Password';
                return $this->errors;
            }
        } else {
            $this->isLogged = false;
            $this->errors[] = 'Login not exists';
            return $this->errors;
        }
    }

    public function isLoginExists($login) {
        $results = $this->db->query('SELECT * FROM players WHERE login = \'' . $login .'\'');
        if ($results->num_rows) {
            return true;
        } else {
            return false;
        }
    }

    public function isEmailExists($email) {
        $results = $this->db->query('SELECT email FROM players WHERE email =\'' . $email . '\';');

        if ($results->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function register($data = array()) {
        if (!$this->isEmailExists($data['email'])) {
            if (!$this->isLoginExists($data['login'])) {
                if ($data['password_confirmation'] == $data['password']) {
                    $salt = salt();
                    $hash = md5($data['password'] . $salt);
                    $this->db->query('INSERT INTO players(login, email, hash, salt, lvl, exp, gold, items_id) VALUES (\''.$data['login'].'\', \''.$data['email'].'\', \''.$hash.'\', \''.$salt.'\', 0, 0, 0, 0);');
                    return true;
                } else {
                    $this->errors[] = 'Error: Passwords not equal!';
                    return $this->errors;
                }
            } else {
                $this->errors[] = 'Error: Login already register!';
                return $this->errors;
            }
        } else {
            $this->errors[] = 'Error: Email already register!';
            return $this->errors;
        }
    }


}