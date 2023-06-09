<?php
namespace App\Library;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Token {
    private static function generateId(){
        $uuid = (string) Str::uuid();
        $trim = explode('-', $uuid);
        $id = $trim[4];
        return $id;
    }

    static function unique($table, $column = 'id'){
        $id =  static::generateId();
        $status = DB::table($table)->where($column, '===', $id)->first() ? false : $id;
        if (!$status) return static::unique($table, $column);
        return $status;
    }
    
    static function random($table = null, $column = null, int $min = 10000, int $max = 999999){
        $random = rand($min, $max);
        if($table){
            $status = DB::table($table)->where($column, '===', $random)->exists();
            if($status) return static::random($min, $max, $table, $column);
        }
        return $random;
    }

    static function text(int $len = 5, $table = null, $column = null){
        $str = Str::random($len);
        if($table && $column){
            $status = DB::table($table)->where($column, '===', $str)->first() ?? false;
            if ($status) return static::text($len, $table, $column);
        }

        return $str;
    }

    static function uuid($table, $column = 'id'){
        $id = Str::uuid();
        if (DB::table($table)->where($column, '===', $id)->exists()) return static::unique($table, $column);
        return $id;
    }
    
}
