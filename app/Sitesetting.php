<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Sitesetting extends Model
{

    use Sluggable;

    protected $fillable = ['name','slug','company_name','company_address', 'logo',
        'first_phonenumber','second_phonenumber','facebook','instagram','youtube','twitter'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'company_name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
