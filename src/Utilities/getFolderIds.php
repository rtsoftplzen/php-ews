<?php

namespace garethp\ews\Utilities;

use garethp\ews\API\Type\BaseFolderIdType;

// Guarded: this file lives inside the PSR-4 root, so a class lookup of the same name would include it again
if (!function_exists(__NAMESPACE__ . '\getFolderIds')) {
    function getFolderIds($folderIds)
    {
        $folders = ensureIsArray($folderIds);

        $folderIds = array_map(function (BaseFolderIdType $folderId) {
            return $folderId->toArray(true);
        }, $folders);

        return array_reduce($folderIds, function ($folderIds, $folderId) {
            $folderIds[key($folderId)][] = current($folderId);
            return $folderIds;
        }, []);
    }
}
