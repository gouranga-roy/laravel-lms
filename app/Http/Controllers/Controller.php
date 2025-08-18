<?php

namespace App\Http\Controllers;

use Log;

abstract class Controller
{
    /**
     * Unique Name Generator
     */
    protected function uniqueFileName($file = null) {

        if( $file ) {
            $uniqueName = md5(rand(99999,999999999) . '_' .time() . '_' . str_shuffle("goprogmafesw4dage5geojpa6dko2derrgyyj2")). "." . $file -> getClientOriginalExtension();
        } else {
            $uniqueName = md5(rand(99999,999999999) . '_' .time() . '_' . str_shuffle("goprogmafesw4dage5geojpa6dko2derrgyyj2"));
        }

        return $uniqueName;
    }

    /**
     * File Upload Method
     */
    protected function fileUpload($file = null, $path = 'media') {

        if (!$file) {
            return null; 
        }
     
        // Generate a unique file name
        $fileName = $this -> uniqueFileName($file);

        // Upload file to path
        $file -> move(public_path($path), $fileName);

        return $fileName;
    }


    // Previous Media Delete
    // protected function previousMedia($oldFileName = null, $path = 'media')
    // {
    //     if ($oldFileName) {
    //         $fullPath = public_path($path . '/' . $oldFileName);

    //         if (file_exists($fullPath)) {
    //             unlink($fullPath); // delete the file
    //         } else {
    //             \Log::warning('File not found at path: ' . $fullPath);
    //         }
    //     }
    // }

}
