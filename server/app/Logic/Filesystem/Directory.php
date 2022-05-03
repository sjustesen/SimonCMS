<?php

namespace App\Logic\Filesystem;

use Laravel\Lumen\Application;

class Directory
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

    public static function getContents() {

    }

    public static function getContentsRecursive($path, int $depth = 0, $maxdepth = 4)
    {

        $dir = new \DirectoryIterator($path);

        $files = [];
        $dirs = [];
        $dirs_and_files = [];

        foreach ($dir as $fileInfo) {
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
                $dir->children = Directory::getContentsRecursive($path, $depth, $maxdepth);
                $depth += 1;
                $dirs[] = $dir;
            } else {
                $files[] = $dir;

            }
        }
        $dirs_and_files = array_merge($dirs, $files);
        return $dirs_and_files;
    }
}
