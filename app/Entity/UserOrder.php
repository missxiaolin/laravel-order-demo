<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserOrder extends Model
{
    protected $table = 'user_order';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'order_no',
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
        $this->setConnection('mysql_' . sprintf("%02d", $this->user_id % 10))->setTable('user_order_' . sprintf("%02d", $this->user_id % 10));
        return parent::save($options);
    }

    /**
     * @param $userId
     * @return $this
     */
    public function setTableName($userId)
    {
        $this->setConnection('mysql_' . sprintf("%02d", $this->user_id % 10))->setTable('user_order_' . sprintf("%02d", $userId % 10));
        return $this;
    }


}