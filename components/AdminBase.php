<?php

/**
 * Abstract cla AdminBase use ib admin panel 
 */
abstract class AdminBase
{

    /**
     * Check user is admin
     * @return boolean
     */
    public static function checkAdmin()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);

        if ($user['role'] == 'admin') {
            return true;
        }

        die('Access denied');
    }

}
