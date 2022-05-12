<?php
namespace App\Logic\Filesystem;

enum FilesystemListFilter {
	case OnlyDirectories;
	case OnlyFiles;
	case FilesAndDirectories;
}
