<?php

namespace App\Http\Controllers;

class PemrosesanBitmap
{
    protected $file;
    protected $prosesimage;
    protected $imageType;
    protected $orientasi;
    protected $width;
    protected $height;
    protected $imageXt;
    
    public function __construct($file)
    {
        $this -> imageType = exif_imagetype($file);
        $this -> orientasi = @exif_read_data($file);
        
    }

    public function resize(){

        $file = $this -> file;
        $width = $this -> width;
        $height = $this -> height;
        
        if ( $width > 1000 ){

            // $percent = (1000 / $width) * 100;
            // $newWidth = ( $percent/100 ) * $width;
            // $newHeight = ( $percent/100 ) * $height;
            $image = imagescale($file,600,-1,IMG_NEAREST_NEIGHBOUR);
            $xaxis = imagesx( $image );
            $yaxis = imagesy( $image );

            $background = imagecreatetruecolor($xaxis,$yaxis);
            $fillwhite = imagecolorallocate($background,255,255,255);
            imagefill($background, 0, 0, $fillwhite);
            imagecopyresized($background,$file,0,0,0,0,$xaxis,$yaxis,$width,$height);
            return $background;
        }

        else {

            // $dstimage = $file = $this -> file;
            $background = imagecreatetruecolor($width,$height);
            $fillwhite = imagecolorallocate($background,255,255,255);
            imagefill($background, 0, 0, $fillwhite);
            imagecopyresized($background,$file,0,0,0,0,$width,$height,$width,$height);
            return $background;
        }
        
    }

    public function orientasi_exif( $rawFile ) {

        $orientasi = $this -> orientasi;

        if (!empty($orientasi['Orientation'])) {
            switch ($orientasi['Orientation']) {
                case 3:
                    $image = imagerotate($rawFile, 180, 0);
                    break;
                
                case 6:
                    $image = imagerotate($rawFile, -90, 0);
                    break;
                
                case 8:
                    $image = imagerotate($rawFile, 90, 0);
                    break;
            }   
        }

        else {
            $image = $rawFile;
        }

        return $image;
    }

    public function thumbnail() {

        $file = $this -> file;
        $width = $this -> width;
        $height = $this -> height;
        $dstimage = imagecreatetruecolor(200,200);
        $image = imagescale($file,200,-1,IMG_NEAREST_NEIGHBOUR);
        $xaxis = imagesx( $image );
        $yaxis = imagesy( $image );

        $white = imagecolorallocate($dstimage,255,255,255);
        // imagefill($dstimage, 0, 0, $white);
        imagecopy($dstimage,$image,0,0,0,0,$xaxis,$yaxis);
    
        return $dstimage;
    }

    public function preprocess($file) {

        $imageType = $this -> imageType;
        $orientasi = $this -> orientasi;

    // Create an image resource based on the file type
        switch ($imageType) {

            case IMAGETYPE_JPEG:
                $gdimage = imagecreatefromjpeg($file);
                $this -> imageXt = "jpeg";
                $this -> width = imagesx( $gdimage );
                $this -> height = imagesy( $gdimage );
                break;

            case IMAGETYPE_PNG:
                $gdimage = @imagecreatefrompng($file);
                $this -> imageXt = "png";
                $this -> width = imagesx( $gdimage );
                $this -> height = imagesy( $gdimage );
                break;

            case IMAGETYPE_WEBP:
                $gdimage = imagecreatefromgif($file);
                $this -> imageXt = "webp";
                $this -> width = imagesx( $gdimage );
                $this -> height = imagesy( $gdimage );
                break;

            // Add more cases for other image types if needed
            default:
                // Handle unsupported image types
                break;
        }

        if ($orientasi != false){

            $reoriented = $this -> orientasi_exif($gdimage,$orientasi);
            $this -> file = $reoriented;
        }

        else {

            $this -> file = $gdimage;
            
        }
    }
}
