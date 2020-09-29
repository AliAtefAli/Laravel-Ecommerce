<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Ramsey\Uuid\Uuid;


trait Uploadable {

    public function uploadOne($file, $width, $height, $domain)
    {
        // $image = Image::make($file)->resize($width, $height);
        // $path = Uuid::uuid4()->toString() . '.' . $file->getClientOriginalExtension();
        // $image->save(public_path('assets/' . $path) );

        // return $path;

         $directory = public_path('assets/images/' . $domain);
         if(!File::isDirectory( $directory)){
             File::makeDirectory($directory, 0777, true, true);
         }
         $image = Image::make($file)->resize($width, $height);
         $path = Uuid::uuid4()->toString() . '.' . $file->getClientOriginalExtension();
         $image->save( $directory .  '/' . $path );

         return $path;


//        $directory = public_path('assets/images/' . $domain);
//        if(!File::isDirectory( $directory)){
//            File::makeDirectory($directory, 0777, true, true);
//        }
//
//        $image = Image::make($directory . '/' . $file->getClientOriginalName() )->resize($width,
//            $height);
//        $path = Uuid::uuid4()->toString() . '.' . $file->getClientOriginalExtension();
//        $image->save( $directory );
    }

}
