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
        $affiliator_id = $this->getAffiliatorId();
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
        return $this->render('affiliator.affiliator_invitation.index', compact('data', 'form'));
    }

    private function getAffiliatorId()
    {
        $user_id = Auth::user()->id;
        $affiliator = $this->affiliator_model->getByUserId($user_id);
        return $affiliator['id'] ?? 0;
    }

    private function form($data)
    {
        $user_email = [];

        foreach ($data as $item) {
            $user_email[$item->user_id] = $item->users->email;
        }
        // dd($user_email);
        // dd(array_get($user_email, '112'));
        return compact('user_email');
    }
}
