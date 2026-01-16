<?php

namespace App\Services;

class CheckOwnership
{
    public static function check($userId, $itemId)
    {
        if ($userId != $itemId) {
            return false;
        }

        return true;
    }
}
