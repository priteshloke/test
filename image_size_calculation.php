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

        $imageratio = $this->__secondImageSizes['width'] / $this->__secondImageSizes['height'];

        print("ratio {$imageratio} \n");

        if ($this->__secondImageSizes['width'] > $this->__firstImageSizes['width']) {
            $newWidth = $this->__firstImageSizes['width'];
            $newHeight = round($newWidth / $imageratio);
        } else if ($this->__secondImageSizes['height'] > $this->__firstImageSizes['height']) {  
            $newWidth = $this->__secondImageSizes['width'];
            $newHeight = ($this->__firstImageSizes['height'] * $this->__secondImageSizes['width']) / $this->__firstImageSizes['width'];

            // $newimageratio = $newWidth / $newHeight;
            // print("new ratio {$newimageratio} \n");
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

        $imageratio = $this->__firstImageSizes['width'] / $this->__firstImageSizes['height'];

        if ($this->__secondImageSizes['width'] < $this->__firstImageSizes['width']) {
            // $newWidth = round($this->__secondImageSizes['width'] * $imageratio);
            // $newHeight = $this->__firstImageSizes['height'];
            $newWidth = round($this->__secondImageSizes['width'] / 2);
            $newHeight = round($newWidth / $imageratio);
        } else {
            return $this->__secondImageSizes;
        }

        return ['width' => $newWidth, 'height' => $newHeight];
    }
}

// $firstIimageSizes[] = ['width' => 180, 'height' => 250];
// $secondImageSizes[] = ['width' => 360, 'height' => 200];

// $firstIimageSizes[] = ['width' => 250, 'height' => 500];
// $secondImageSizes[] = ['width' => 500, 'height' => 90];

// $firstIimageSizes[] = ['width' => 1000, 'height' => 500];
// $secondImageSizes[] = ['width' => 500, 'height' => 90];

$firstIimageSizes[] = ['width' => 250, 'height' => 250];
$secondImageSizes[] = ['width' => 150, 'height' => 260];

foreach($firstIimageSizes as $key => $values) {
    $matchImage = new MatchImageSize($values, $secondImageSizes[$key]);
    print("for \n");
    print_r($values);
    print_r($secondImageSizes[$key]);
    print("containt sizes for second image \n");
    print_r($matchImage->getContaintsSizes());
    print("cover sizes for first image \n");
    print_r($matchImage->getCoverSizes());
}




