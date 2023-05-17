<?php

namespace App\Library;

use Illuminate\Support\Str;

class FileHandler {

    static $folder = 'storage/';

    static function upload($files){
        try {
            if(!$files) return false;

            if(is_array($files)){
                for($i=0; $i < count($files); $i++) {
                    $file = $files[$i];
                    $file_array[$i] = self::saveToStorage($file);
                }
                
                return json_encode($file_array);
            }
            $url = self::saveToStorage($files);
            return $url ?? null;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    static function saveToStorage($file){
        $ext = $file->getClientOriginalExtension();
        $imageName = Str::random().'.'.$ext;
        $file->move(public_path('/'.self::$folder), $imageName);
        return asset('/'.self::$folder.$imageName);
    }

    static function updateFile($file, $oldFile){
        self::deleteFile($oldFile);
        return self::upload($file);
    }

    static function deleteFiles(array $files){
        foreach ($files as $file) {
            self::deleteFile($file);
        }
    }

    static function deleteFile($file){
        if ($file) {
            $cloudinary_id = self::extractFileId($file);
        }
    }

    private static function extractFileId($file){
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        return basename($file, $ext);
    }


}
