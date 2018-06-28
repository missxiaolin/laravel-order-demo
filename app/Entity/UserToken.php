<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use OkamiChen\TableShard\Traits\TableShard;

class UserToken extends Model
{
    use TableShard;

    protected $table = 't_users_token';

    /**
     * 分表建值
     * @return string
     */
    public function getShardKey()
    {
        return 'user_id';
    }

    /**
     * 分表个数
     * @return int
     */
    public function getShardNum()
    {
        return 10;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'open_id', 'mobile', 'ua', 'token', 'expires_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
