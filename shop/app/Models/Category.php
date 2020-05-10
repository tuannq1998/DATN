<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'slug', 'icon', 'avatar', 'active', 'total_product', 'desc_seo', 'title_seo', 'keyword_seo'];
    const STATUS_SHOWS = 1;
    const  STATUS_HIDE = 0;
    protected $c_active = [
        1 => [
            'name' => 'Shows',
            'class' => 'label-primary'
        ],
        0 => [
            'name' => 'Hide',
            'class' => 'label-default'
        ]
    ];

    public function getStatus()
    {
        return Arr::get($this->c_active, $this->active, '[N\A]');
    }
}
