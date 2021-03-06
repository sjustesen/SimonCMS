<?php

namespace App\Logic\Filesystem;

use App\Logic\Filesystem\ListFilter;
use App\Logic\HostingEnvironment\VirtualPath;

class FilesAndDirectories
{
    public static function getContents() {

    }

    public static function getContentsRecursive($path, $maxdepth = 4, 
                                $listfilter = ListFilter::FilesAndDirectories)
    {
		static $depth = 0;
        $it = new \DirectoryIterator($path);

        $files = [];
        $dirs = [];
        $dirs_and_files = [];

        foreach ($it as $fileInfo) {
            if ($depth >= $maxdepth)
                return;
			
            if ($fileInfo->isDot()) continue;
            if ($fileInfo->getFileName() == '.gitkeep') continue;

            $it = new \StdClass();
            $it->name = $fileInfo->getFileName();
            $it->path = VirtualPath::getUploadsUrl($fileInfo->getPath()); //self::getRelativePath($fileInfo->getPathname());
            $it->depth = $depth;
            $it->type = $fileInfo->isDir() ? 'folder' : 'file';
            
            if ($listfilter == ListFilter::OnlyFiles || $listfilter == ListFilter::FilesAndDirectories) {
                if ($fileInfo->isDir()) {
                    $path = $fileInfo->getPathname();
                    $it->children = self::getContentsRecursive($path, $maxdepth, $listfilter);
                    $depth += 1;
                    $dirs[] = $it;
                }
            }
            if ($listfilter == ListFilter::FilesAndDirectories || $listfilter == ListFilter::OnlyFiles) {
                if (!$fileInfo->isFile()){
                    $files[] = $it;
                }
            } 
        }
        $dirs_and_files = array_merge($dirs, $files);
        return $dirs_and_files;
    }

    public static function getFilesRecursive ($directory = null, $files = array()) {
        $iterator = new \DirectoryIterator ( $directory );
        
        $files = [];
        foreach ( $iterator as $info ) {
            if ($info->isDot()) continue;

            if ($info->isFile () && !str_starts_with($info->getFileName(), '.')) {
                $f = new \StdClass();
                $f->name = explode('.', $info->getFilename())[0];
                $f->filename = $info->getFileName();
                $f->path = $info->getPath(); //self::getRelativePath($fileInfo->getPathname());
                $files[] = $f;
            }
        }
        return $files;
    }
}
