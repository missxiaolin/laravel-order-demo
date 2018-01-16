<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'open_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * @param array $options
     * @return bool
     */
    public function save(array $options = array())
    {
        $this->setConnection('mysql_' . sprintf("%02d", $this->user_id % 10))->setTable('user_' . sprintf("%02d", $this->user_id % 10));
        return parent::save($options);
    }

    /**
     * @param $userId
     * @return $this
     */
    public function setTableName($userId)
    {
        $this->setConnection('mysql_' . sprintf("%02d", $this->user_id % 10))->setTable('user_' . sprintf("%02d", $userId % 10));
        return $this;
    }

    /**
     * 获取订单信息
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        $model = app(UserOrder::class);
        $model->setTableName($this->user_id);
        return new HasMany($model->newQuery(), $this, 'user_id', 'user_id');
    }

    /**
     * @return BelongsToMany
     */
    public function shop()
    {
        $model = app(Shop::class);
        $model->setTableName($this->user_id);
        $main_shop = 'user_main_shop_' . sprintf("%02d", $this->user_id % 10);
        return new BelongsToMany($model->newQuery(), $this, $main_shop, 'user_id', 'shop_id', 'user_id', $model->getKeyName(), null);
    }
}
