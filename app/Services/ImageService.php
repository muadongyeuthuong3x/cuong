<?php
namespace App\Services;
use File;
class ImageService
{
    public function getFileName($file)
    {
        return $file->getClientOriginalName();
    }

    public function getFileSize($file)
    {
        return $file->getSize();
    }

    public function getFileType($file)
    {
        return $file->getMimeType();
    }

    public function checkFile($file)
    {
        $type = $this->getFileType($file);
        $size = $this->getFileSize($file);
        $type_image = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'];
        if (in_array($type, $type_image)) {
            if ($size <= 1048576) {
                return 1;
            } else {
                return 0;
            }
        }
        return -1;
    }
}
