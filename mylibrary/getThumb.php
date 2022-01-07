<?php
function getThumb($Original)
{
   if (!$Original['name'])
   {
      //no image supplied, use default
      $TempName = "images/noimage.jpg";
      $TempFile = fopen($TempName, "r");
      $thumbnail = fread($TempFile, fileSize($TempName));
   } else
   {
      //get image
      $Picture =  file_get_contents($Original['tmp_name']);
      //create image
      $SourceImage = imagecreatefromstring($Picture);
      if (!$SourceImage)
      {
         //not a valid image
        echo "Not a valid image\n";
        $TempName = "images/noimage.jpg";
        $TempFile = fopen($TempName, "r");
        $thumbnail = fread($TempFile, fileSize($TempName));
      } else
      {
         //create thumbnail
         $width = imageSX($SourceImage);
         $height = imageSY($SourceImage);
         $newThumb = imagecreatetruecolor(80, 60);

         //resize image to 80 x 60
         $result = imagecopyresampled($newThumb, $SourceImage, 
                                      0, 0, 0, 0,
                                      80, 60, $width, $height);

         //move image to variable
         ob_start();
         imageJPEG($newThumb);
         $thumbnail = ob_get_contents();
         ob_end_clean();
      }
   }
   return $thumbnail;
}?>