<?php

namespace App\Traits;
use Illuminate\Support\Str;

trait HasSlug
{
    public function sluggable($string)
    {
        return Str::slug($string);
    }
}
