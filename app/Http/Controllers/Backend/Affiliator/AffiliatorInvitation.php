<?php

namespace App\Http\Controllers\Backend\Affiliator;

use App\Http\Controllers\Backend\Base;
use App\Http\Requests\Backend\Affiliator\PostInput;
use App\Models\Backend\Affiliator\AffiliatorInvitation as AffiliatorInvitationModel;

class AffiliatorInvitation extends Base
{
    public function __construct(
        AffiliatorInvitationModel $model
    ) {
        $this->model = $model;
    }
}
