<?php
class MatchImageSize
{
    private $__firstImageSizes = [];
    private $__secondImageSizes = [];
    public function __construct($firstImageSizes, $secondImageSizes)
    {
        $this->__firstImageSizes = $firstImageSizes;
        $this->__secondImageSizes = $secondImageSizes;
    }

    public function getContaintsSizes()
    {
        if ($this->__firstImageSizes['width'] == $this->__secondImageSizes['width'] 
        && $this->__firstImageSizes['height'] == $this->__secondImageSizes['height'] ) {
            return $this->__firstImageSizes;
        }

        $imageratio = $this->__firstImageSizes['width'] / $this->__firstImageSizes['height'];

        if ($this->__secondImageSizes['width'] > $this->__firstImageSizes['width']) {
            $newWidth = $this->__firstImageSizes['width'];
            $newHeight = $this->__secondImageSizes['height'] * $imageratio;
        } else {
            return $this->__secondImageSizes;
        }

        return ['width' => $newWidth, 'height' => $newHeight];
    }

    public function getCoverSizes()
    {
        if ($this->__firstImageSizes['width'] == $this->__secondImageSizes['width'] 
        && $this->__firstImageSizes['height'] == $this->__secondImageSizes['height'] ) {
            return $this->__firstImageSizes;
        }

        return $this->__secondImageSizes;
    }
}

$matchImage = new MatchImageSize(['width' => 180, 'height' => 250], ['width' => 360, 'height' => 200]);
print("containt sizes \n");
print_r($matchImage->getContaintsSizes());
print("cover sizes \n");
print_r($matchImage->getCoverSizes());