<?php

namespace App\Logic\Filesystem;

use Directory;

class DirectoryTraversal {

    private static $path;

    public static function searchDirectoryRecursive($path, int $depth = 0, $maxdepth = 4) {

            $dir = new \DirectoryIterator($path); 

            $arr = [];
            foreach ($dir as $key=>$fileInfo)
            {
                if ($depth >= $maxdepth)
                    return;

                if($fileInfo->isDot()) continue;
                if ($fileInfo->getFileName() == '.gitkeep') continue;
                    
                    $dir = new \StdClass();
                    $dir->name = $fileInfo->getFileName();
                    $dir->path = $fileInfo->getPathname();
                    $dir->depth = $depth;

                    if ($fileInfo->isDir()) {
                        $dir->children = DirectoryTraversal::searchDirectoryRecursive($fileInfo->getPathname(), $depth);
                    }
                    $dir->type = $fileInfo->isDir() ? 'folder' : 'file';
                
                    $arr[] = $dir;
            }
            return $arr;
        }
}