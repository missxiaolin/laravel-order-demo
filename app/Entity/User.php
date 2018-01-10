<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
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

    public function save(array $options = array())
    {
        $this->setConnection('mysql_' . sprintf("%02d", $this->user_id % 10))->setTable('user_' . sprintf("%02d", $this->user_id % 10));
        return parent::save($options);
    }

    public function setTableName($userId)
    {
        $this->setConnection('mysql_' . sprintf("%02d", $this->user_id % 10))->setTable('user_' . sprintf("%02d", $userId % 10));
        return $this;
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        $model = app(UserOrder::class);
        $model->setTableName($this->user_id);
        return new HasMany($model->newQuery(), $this, 'user_id', 'user_id');
    }
}
