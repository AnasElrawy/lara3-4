<?php

namespace App\Models;

use Carbon\Carbon;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Casts\Attribute;





class Posts extends Model
{
    use HasFactory;

    use Sluggable;

    use SoftDeletes;



    protected $fillable = ['id', "title", "posted_by", "created_at", "image", "description","creator_id","slug","user_id","deleted_at","updated_at"];



    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    function user(){
        return $this->belongsTo(User::class);

        # track property contains track object
    }



    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::parse($value)->isoFormat('dddd D'),
        );
    }

}
