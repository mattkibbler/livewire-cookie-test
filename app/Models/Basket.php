<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

class Basket extends Model
{
    use HasFactory;

    public static function findOrCreate() {

        $basket = null;
        $basketId = Cookie::get('basket');

        // Try to get an existing basket based on the stored ID
        if($basketId) {
            $basket = Basket::find($basketId);
        }

        // If no basket found, make a new one
        if(!$basket) {
            $basket = Basket::create();
        }

        $oneYearInMinutes = 525600;
        Cookie::queue('basket', $basket->id, $oneYearInMinutes);

        return $basket;

    }
}
