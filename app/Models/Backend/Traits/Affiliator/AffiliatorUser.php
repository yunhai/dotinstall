<?php

namespace App\Models\Backend\Traits\Affiliator;

use App\Models\Backend\User as UserModel;

trait AffiliatorUser
{
    public static function bootAffiliatorUser()
    {
        static::created(function ($model) {
            $model->createUser($model);
        });

        static::updated(function ($model) {
            $model->updateUser($model);
        });

        static::deleted(function ($model) {
            $model->deleteUser($model);
        });
    }

    protected function createUser($model)
    {
        $data = $model->toArray();
        $data['affiliator_id'] = $data['id'];

        $target = (new UserModel())->createAffiliatorUser($data);
        $model->where('id', $model->id)->update(['user_id' => $target['id']]);
    }

    protected function updateUser($model)
    {
        $data = $model->toArray();
        $data['affiliator_id'] = $data['id'];
        unset($data['id']);

        (new UserModel())->updateAffiliatorUser($data);
    }

    protected function deleteUser($model)
    {
        (new UserModel())->deleteAffiliatorUser($model->id);
    }
}
