<?php

class Image {
	private $file;
	private $path = null;

	private function resize($width, $height) {
	  /* Get original image x y*/
	  list($w, $h) = getimagesize($this->file['tmp_name']);
	  /* calculate new image size with ratio */
	  $ratio = max($width/$w, $height/$h);
	  $h = ceil($height / $ratio);
	  $x = ($w - $width / $ratio) / 2;
	  $w = ceil($width / $ratio);

	  if ($this->path == null) {
		  /* new file name */
		  $this->path = 'img/'.$width.'x'.$height.'_'.$this->file['name'];
	  }

	  /* read binary data from image file */
	  $imgString = file_get_contents($this->file['tmp_name']);

	  /* create image from string */
	  $image = imagecreatefromstring($imgString);
	  $tmp = imagecreatetruecolor($width, $height);
	  imagecopyresampled($tmp, $image,
	    0, 0,
	    $x, 0,
	    $width, $height,
	    $w, $h);

	  /* Save image */
	  switch ($this->file['type']) {
	    case 'image/jpeg':
	      imagejpeg($tmp, $path, 100);
	      break;
	    case 'image/png':
	      imagepng($tmp, $path, 0);
	      break;
	    case 'image/gif':
	      imagegif($tmp, $path);
	      break;
	    default:
	      exit;
	      break;
	  }
	  return $path;
	  /* cleanup memory */
	  imagedestroy($image);
	  imagedestroy($tmp);
	}

	public function imgUpload() {
		// settings
		$max_file_size = 1024*200; // 200kb
		$valid_exts = array('jpeg', 'jpg', 'png', 'gif');

		// thumbnail sizes
		$sizes = array(100 => 100, 150 => 150, 250 => 250);

		if (isset($this->file)) {
		  if( $this->file['size'] < $max_file_size ){
		    // get file extension
		    $ext = strtolower(pathinfo($this->file['name'], PATHINFO_EXTENSION));
		    if (in_array($ext, $valid_exts)) {
		      /* resize image */
		      foreach ($sizes as $w => $h) {
		        $files[] = $this->resize($w, $h);
		      }

		    } else {
		      $msg = 'Unsupported file';
		    }
		  } else{
		    $msg = 'Please upload image smaller than 200KB';
		  }
		}		
	}
}
