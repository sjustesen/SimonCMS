<?php

namespace App\Logic\Filesystem;

use Directory;
use Laravel\Lumen\Application;

class DirectoryTraversal
{

    public static function getUploadsUrl($path)
    {
        $path_arr = explode(DIRECTORY_SEPARATOR, $path);
        
        // not the upload dir, bail early
        if (!in_array('uploads', $path_arr)) return;

        $a = [];
        $i = sizeof($path_arr) - 1;
        
        do {
            array_push($a, $path_arr[$i]);
            $i--;
        } while ($path_arr[$i] != 'uploads');
        
        $a = array_reverse($a);
        array_unshift($a, UPLOADS_URL);
        
        return implode(DIRECTORY_SEPARATOR, $a);
    }

    public static function searchDirectoryRecursive($path, int $depth = 0, $maxdepth = 4)
    {

        $dir = new \DirectoryIterator($path);

        $arr = [];
        foreach ($dir as $key => $fileInfo) {
            if ($depth >= $maxdepth)
                return;

            if ($fileInfo->isDot()) continue;
            if ($fileInfo->getFileName() == '.gitkeep') continue;

            $dir = new \StdClass();
            $dir->name = $fileInfo->getFileName();
            $dir->path = self::getUploadsUrl($fileInfo->getPathname()); //self::getRelativePath($fileInfo->getPathname());
            $dir->depth = $depth;
            $dir->type = $fileInfo->isDir() ? 'folder' : 'file';

            if ($fileInfo->isDir()) {
                $path = $fileInfo->getPathname();
                $dir->children = DirectoryTraversal::searchDirectoryRecursive($path, $depth, $maxdepth);
                $depth += 1;
            }

            $arr[] = $dir;
            sort($arr);
        }
        return $arr;
    }
}
