<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/

class Image {

    public $filename    =   "";
    public $caption     =   "";

    /**
     * Return full path to image.
     * @return string path to file to make thumb
     */
    public function fullPath() 
    {
        return "assets/path/{$this->filename}";
    }

    /**
     * Renders HTML IMG for thumb of given size.
     * 
     * @param int $width max width, set to -1, if not important
     * @param type $height max height, set to -1, if not important
     * @return string html tag for image with correct width and height attributes
     */
    public function htmlTag($width, $height) {
        $t = $this->getThumb($width, $height);
        return "<img src=\"{$t}\" alt=\"{$this->caption}\" width=\"{$width}\" height=\"{$height}\" />";
    }

    /**
     * Get/create thumb image
     * @param int $width width of the image
     * @param int $height height of the image
     * @return string path to the image
     */
    public function getThumb(&$width, &$height) {
        $currentImage   =   $this->fullPath();
        $path           =   "assets/path/";
        $thumbFilename = md5($this->path . $width . $height) . '.png';

        $thumbDir = 'data/thumbs/';
        $thumbFilename = "{$thumbDir}/{$thumbFilename}";

        // thumb already done?
        if (is_file($thumbFilename)) {
            // get real size to create correct html img tag
            if ($width < 0 || $height<0) {
                $size = getimagesize($thumbFilename);
                $width = $size[0];
                $height = $size[1];
            }
            return $thumbFilename;
        }

        $ext = strtolower(pathinfo($currentImage, PATHINFO_EXTENSION));
        if ($ext == 'jpeg' || $ext == 'jpg') {
            $source = imagecreatefromjpeg($currentImage);
        } else if ($ext == 'gif') {
            $source = imagecreatefromgif($currentImage);
        } else if ($ext == 'png') {
            $source = imagecreatefrompng($currentImage);
        }

        $currentWidth = imagesx($source);
        $currentHeight = imagesy($source);

        // the sizes which we really will apply (default setup)
        $realWidth = $width;
        $realHeight = $height;
        $realX = 0;
        $realY = 0;

        // decide regarding cutting
        // if all params > 0, cuttin will be done
        $cut = FALSE;
        if ($width > 0 && $height > 0) {
            $cut = TRUE;
        } else if ($width < 0) { // width is not important, set proportion to that
            $width = $realWidth = round($currentWidth * $height / $currentHeight);
        } else if ($height < 0) { // height is not imporant
            $height = $realHeight = round($currentHeight * $width / $currentWidth);
        }

        if ($cut) {
            $kw = $currentWidth / $width;
            $kh = $currentHeight / $height;

            $k = $kw < $kh ? $kw : $kh;

            $realWidth = round($currentWidth / $k);
            $realHeight = round($currentHeight / $k);

            if ($kh < $kw) {
                $realX = round(($realWidth - $width) / 2) * $k;
            } else {
                $realY = round(($realHeight - $height) / 2) * $k;
            }
        }

        $virtual = imagecreatetruecolor($width, $height);
        imagealphablending($virtual, false);
        $col = imagecolorallocatealpha($virtual, 0, 0, 0, 127);
        imagefill($virtual, 0, 0, $col);
        imagesavealpha($virtual, true);

        imagecopyresampled($virtual, $source, 0, 0, $realX, $realY, $realWidth, $realHeight, $currentWidth, $currentHeight);

        // create file
        imagepng($virtual, $thumbFilename);

        return $thumbFilename;
    }
}