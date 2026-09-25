<?php

namespace garethp\ews\Utilities;

// Guarded: this file lives inside the PSR-4 root, so a class lookup of the same name would include it again
if (!function_exists(__NAMESPACE__ . '\ensureIsDateTime')) {
    /**
     * @param $dateTime
     * @return \DateTime
     */
    function ensureIsDateTime($dateTime)
    {
        if (!$dateTime instanceof \DateTime) {
            return new \DateTime($dateTime);
        }

        return $dateTime;
    }
}
