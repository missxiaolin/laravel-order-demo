<?php

namespace App\Src\Repository;

use App\Entity\UserOrder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entity\User;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FormRepository
 * @package namespace App\Repository;
 */
class UserRepository extends BaseRepository implements RepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     *
     * @param type $userId
     * @return FormRepository
     */
    public function table($userId)
    {
        $this->model
            ->setConnection('mysql_' . sprintf("%02d", $userId % 10))
            ->setTable('user_' . sprintf("%02d", $userId % 10));
        return $this;
    }

    /**
     * 获取用户
     * @param $userId
     * @return mixed
     */
    public function getUserId($userId)
    {
        return $this->table($userId)->findByField('user_id', $userId)->first();
    }

    /**
     * 插入用户
     * @param $data
     * @return mixed
     */
    public function setUser($data)
    {
        $userId = array_get($data, 'userId', 0);
        $openId = array_get($data, 'openId', 0);
        $model = $this->table($userId)->findByField('user_id', $userId)->first();
        if (!$model) {
            $model = User::create([
                'user_id' => $userId,
                'open_id' => $openId,
            ]);
        }
        return $model;
    }

    public function items()
    {
        $model  = app(UserOrder::class);
        $model->setTableName($this->user_id);
        return new HasMany($model->newQuery(), $this, 'user_id', 'user_id');
    }
}
