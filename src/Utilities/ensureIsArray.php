<?php

namespace garethp\ews\Utilities;

use garethp\ews\API\Type;

// Guarded: this file lives inside the PSR-4 root, so a class lookup of the same name would include it again
if (!function_exists(__NAMESPACE__ . '\ensureIsArray')) {
    /**
     * @param $input
     * @param $checkAssoc
     * @return array
     */
    function ensureIsArray($input, $checkAssoc = false)
    {
        if (!is_array($input)) {
            return [$input];
        }

        if ($checkAssoc && Type::arrayIsAssoc($input)) {
            return [$input];
        }

        return $input;
    }
}

if (!function_exists(__NAMESPACE__ . '\ensureIsMailbox')) {
    function ensureIsMailbox($input)
    {
        if (is_string($input)) {
            $address = new Type\Mailbox();
            $address->setEmailAddress($input);
            $input = $address;
        }

        return $input;
    }
}
