<?php

namespace App\Http\Controllers\Client\Affiliator;

use App\Http\Controllers\Client\Base;
use App\Models\Client\Affiliator\Affiliator as AffiliatorModel;
use Auth;
use Illuminate\Http\Request;

class Affiliator extends Base
{
    public function __construct(
        AffiliatorModel $affiliator_model
    ) {
        $this->affiliator_model = $affiliator_model;
    }

    public function getMyPage(Request $request)
    {
        $affiliator = $this->getAffiliator();

        return $this->render('affiliator.affiliator.mypage', compact('affiliator'));
    }

    private function getAffiliator()
    {
        $user_id = Auth::user()->id;
        return $this->affiliator_model->getByUserId($user_id);
    }

    private function form($data)
    {
        $user_email = [];

        foreach ($data as $item) {
            $user_email[$item->user_id] = $item->users->email;
        }

        return compact('user_email');
    }
}
