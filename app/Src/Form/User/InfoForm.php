<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2018/5/6
 * Time: 下午1:08
 */

namespace App\Src\Form\User;


use App\Src\Basic\Form;

class InfoForm extends Form
{
    /**
     * @var int
     */
    public $userId;

    public function rules()
    {
        return [
            'userId' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute必填。',
        ];
    }

    public function attributes()
    {
        return [
            'userId' => 'userId',
        ];
    }

    public function validation()
    {
        $this->userId = array_get($this->data, 'userId');
    }
}