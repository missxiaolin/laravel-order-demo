<?php

namespace App\Src\Repository;

use App\Entity\UserToken;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FormRepository
 * @package namespace App\Repository;
 */
class UserTokenRepository extends BaseRepository implements RepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserToken::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * 通过userId获取用户信息
     * @param $userId
     * @return mixed
     */
    public function getUser($userId)
    {
        return $this->model->where(['user_id' => $userId])->first();
    }
}
