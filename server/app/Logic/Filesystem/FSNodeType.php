<?php
namespace App\Logic;

public enum FilesystemListFilter {
	case OnlyDirectories;
	case OnlyFiles;
	case FilesAndDirectories;
}
