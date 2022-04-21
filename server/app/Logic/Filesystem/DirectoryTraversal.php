<?php

namespace App\Logic\Filesystem;

class DirectoryTraversal {

    private static $path;

    /** 
     * Get an iterator to be able to traverse the filesystem for files and folders
     * **/
    public static function getRecursiveIterator($path) 
    {   
        $iterator = new \RecursiveDirectoryIterator(
            $path, 
            \FilesystemIterator::SKIP_DOTS);
        
        $index = 0;
        $dirs = array();

        foreach ($iterator as $key => $fileinfo) {
            $dir = new \StdClass();
            
            if ($iterator->getFileName() == '.gitkeep') continue;
            $dir->name = $fileinfo->getFileName();
        
            if ($iterator->hasChildren()) {
                $children = array();
                foreach ($iterator->getChildren() as $key => $child) {
                    $children[] = $child->getFileName();
                }
                    $dir->children = $children;
                } else {
                    $dir->name = $fileinfo->getFileName();
                }
            $index++;
            array_push($dirs, $dir);

        }
        return $dirs;
    }
}