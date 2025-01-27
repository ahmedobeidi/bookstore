<?php

class ImageValidator implements ValidationContract
{
    public function validate($value): bool
    {
        // Check if image file is a actual image or fake image
        $checkIsImage = getimagesize($value["tmp_name"]);
        if ($checkIsImage === false) {
            return false;
        }

        // Check file size
        if ($value["size"] > 1000000) {
            return false;
        }

        // Image extension
        $imageFileType = strtolower(pathinfo($value['name'],PATHINFO_EXTENSION));

        // Allow certain file formats
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        if(!in_array($imageFileType, $allowed)){
            return false;
        }

        return true;
    }
}
