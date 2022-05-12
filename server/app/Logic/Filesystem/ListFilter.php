<?php
namespace App\Logic\Filesystem;

enum ListFilter {
	case OnlyDirectories;
	case OnlyFiles;
	case FilesAndDirectories;
}
