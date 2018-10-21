<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class Image extends Model implements HasMedia
{
    use Uuids;
    use HasMediaTrait;

    protected $fillable = ['user_id', 'album_id'];

    public function album()
    {
        return $this->belongsTo('App\Album');
    }
}
