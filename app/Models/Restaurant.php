<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'address',
        'image',
        'district_id',
        'city_id'
    ];

    /**
     * The foods that belong to the restaurant.
     */
    public function foods()
    {
        return $this->belongsToMany('App\Models\Food');
    }

    public function district()
    {
    	return $this->belongsTo('App\Models\District', 'district_id');
    }

    public function city()
    {
    	return $this->belongsTo('App\Models\City', 'city_id');
    }

    public function get_food($id){
        $food = $this->foods()->where('id', $id)->count();

        if($food > 0){
            return true;
        }else{
            return false;
        }
    }
}
