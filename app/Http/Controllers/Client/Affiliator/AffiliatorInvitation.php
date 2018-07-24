<?php

namespace App\Http\Controllers\Client\Affiliator;

use App\Http\Controllers\Client\Base;
use App\Models\Client\Affiliator\Affiliator as AffiliatorModel;
use App\Models\Client\Affiliator\AffiliatorInvitation as AffiliatorInvitationModel;
use Auth;
use Illuminate\Http\Request;

class AffiliatorInvitation extends Base
{
    public function __construct(
        AffiliatorInvitationModel $model,
        AffiliatorModel $affiliator_model
    ) {
        $this->model = $model;
        $this->affiliator_model = $affiliator_model;
    }

    public function getIndex(Request $request)
    {
        $affiliator = $this->getAffiliator();
        $affiliator_id = $affiliator['id'] ?? 0;

        $input = $request->all();
        $query = $this->model
                    ->with('users')
                    ->where('affiliator_id', $affiliator_id);
        if ($input) {
            $year = $input['year'] ?? 0;
            $month = $input['month'] ?? 0;
            if ($year) {
                if ($month) {
                    $query->where('join_date', 'like', "{$year}-{$month}-%");
                } else {
                    $query->where('join_date', 'like', "{$year}-%");
                }
            }
        }

        $data = $query
                    ->orderBy('id', 'desc')
                    ->paginate(20);

        $form = $this->form($data);
        $form['affiliator'] = $affiliator;

        return $this->render('affiliator.affiliator_invitation.index', compact('data', 'form'));
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
