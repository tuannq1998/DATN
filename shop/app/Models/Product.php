<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;

class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    protected $fillable = ['name','slug','category_id','price','author_id','sale','active','hot','view','keyword_seo','description','contents','avatar','desc_seo','title_seo'];
    const STATUS_PUBLIC = 1;
    const  STATUS_PRIVATE = 0;

    const HOT_ON  = 1;
    const HOT_OFF = 0;
    protected $status = [
        1 =>[
            'name' => 'Show',
            'class'=>'label-primary'
        ],
        0 =>[
            'name'=>'Hide',
            'class'=>'label-default'
        ]
    ];
    protected $p_hot = [
        1 =>[
            'name' => 'Hot',
            'class'=>'label-success'
        ],
        0 =>[
            'name'=>'None',
            'class'=>'label-default'
        ]
    ];

    public function getStatus()
    {
        return Arr::get($this->status, $this->active, '[N\A]');
    }

    public function getHot()
    {
        return Arr::get($this->p_hot, $this->hot, '[N\A]');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
