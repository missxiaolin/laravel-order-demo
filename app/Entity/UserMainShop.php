<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserMainShop extends Model
{
    protected $table = 'user_main_shop';

    protected $fillable = [
        'user_id', 'shop_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function save(array $options = array())
    {
        $this->setConnection('mysql_' . sprintf("%02d", $this->user_id % 10))->setTable('user_main_shop_' . sprintf("%02d", $this->user_id % 10));
        return parent::save($options);
    }
}