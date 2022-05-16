<?php

namespace App\Logic\HostingEnvironment;

class VirtualPath {
    
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

}