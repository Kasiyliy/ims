<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        "title",
        "description",
        "start_date",
        "end_date",
        "short_description",
        "country",
        "city",
        "overall_price",
        "investment_time",
        "year_profit",
        "current_description",
        "business_plan",
        "document",
        "asses_provided",
        "user_id",
        "sphere_id"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function sphere(){
        return $this->belongsTo(Sphere::class);
    }

    public function investments(){
        return $this->hasMany(Investment::class);
    }

    public function sum(){
        $sum = 0;
        foreach($this->investments as $investment){
            $sum+=$investment->price;
        }
        return $sum;
    }
}
