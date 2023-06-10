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
            $newHeight = round($this->__secondImageSizes['height'] * $imageratio);
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

        $imageratio = $this->__secondImageSizes['width'] / $this->__secondImageSizes['height'];

        if ($this->__secondImageSizes['width'] < $this->__firstImageSizes['width']) {
            $newWidth = round($this->__secondImageSizes['width'] * $imageratio);
            $newHeight = $this->__firstImageSizes['height'];
        } else {
            return $this->__secondImageSizes;
        }

        return ['width' => $newWidth, 'height' => $newHeight];
    }
}

$firstIimageSizes[] = ['width' => 180, 'height' => 250];
$secondImageSizes[] = ['width' => 360, 'height' => 200];

$firstIimageSizes[] = ['width' => 250, 'height' => 500];
$secondImageSizes[] = ['width' => 500, 'height' => 90];

$firstIimageSizes[] = ['width' => 1000, 'height' => 500];
$secondImageSizes[] = ['width' => 500, 'height' => 90];

foreach($firstIimageSizes as $key => $values) {
    $matchImage = new MatchImageSize($values, $secondImageSizes[$key]);
    print("containt sizes for second image \n");
    print_r($matchImage->getContaintsSizes());
    print("cover sizes for first image \n");
    print_r($matchImage->getCoverSizes());
}




