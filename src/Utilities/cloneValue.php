<?php

namespace garethp\ews\Utilities;

// Guarded: this file lives inside the PSR-4 root, so a class lookup of the same name would include it again
if (!function_exists(__NAMESPACE__ . '\cloneValue')) {
    function cloneValue($value)
    {
        if (is_object($value)) {
            return clone $value;
        }

        if (is_array($value)) {
            return array_map(function ($value) {
                return cloneValue($value);
            }, $value);
        }

        return $value;
    }
}
