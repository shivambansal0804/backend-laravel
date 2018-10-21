<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class Album extends Model implements HasMedia
{
    use Uuids;
    use HasMediaTrait;

    protected $fillable = ['name', 'user_id', 'uuid', 'album_id'];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('cover')
            ->width(1000)
            ->height(1250);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function child()
    {
        return $this->hasMany('App\Album');
    }

    public function parent()
    {
        return $this->belongsTo('App\Album');
    }

    public function image()
    {
        return $this->hasMany('App\Image');
    }
}
