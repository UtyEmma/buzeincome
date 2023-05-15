<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name'];

    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $keyType ='string';

    static function retrieve() {
        $key = env('RAVE_SECRET_KEY');
        
        $response = Http::withHeaders([
            'Authorization' => "$key"
        ])->get(env('RAVE_BASE_URL')."banks/NG");

        if($response->ok() && $response->status() === 200) return $response->json()['data']; 
    }
    
}
