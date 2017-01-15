<?php

namespace Core\Auth;

use \Core\Database\Database;

class DBAuth {

    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function getUserId() {
        if ($this->logged()) {
            return $_SESSION['auth'];
        }
    }

    /**
     * @param type $username
     * @param type $password
     * @return boolean
     */
    public function login($username, $password) {
        $user = $this->db->prepare('
                SELECT * FROM utilisateurs
                WHERE login = ?', [$username], null, true);
        if ($user) {
            if ($user->password === sha1($password))
                ;
            $_SESSION['auth'] = $user->id;
            return true;
        }else {
            return false;
        }
    }

    public function logged() {
        return isset($_SESSION['auth']);
    }

}
