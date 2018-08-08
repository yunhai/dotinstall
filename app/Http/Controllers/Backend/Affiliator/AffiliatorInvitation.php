<?php

namespace App\Http\Controllers\Backend\Affiliator;

use App\Http\Controllers\Backend\Base;
use App\Models\Backend\Affiliator\AffiliatorInvitation as AffiliatorInvitationModel;
use Illuminate\Http\Request;

class AffiliatorInvitation extends Base
{
    public function __construct(
        AffiliatorInvitationModel $model
    ) {
        $this->model = $model;
    }

    public function getIndex(Request $request, int $affiliator_id)
    {
        $input = $request->all();
        $query = $this->model
                    ->with('users')
                    ->where('affiliator_id', $affiliator_id);

        $year = 0;
        $month = 0;
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

        $data = $query->orderBy('id', 'desc')->get();

        $form = array_merge($this->form($data), compact('year', 'month'));
        return $this->render('affiliator.affiliator_invitation.index', compact('data', 'form'));
    }

    private function form($data)
    {
        $user_email = [];
        foreach ($data as $item) {
            $email = '';
            if ($item->users) {
                $email = $item->users->email;
            }
            $user_email[$item->user_id] = $email;
        }
        return compact('user_email');
    }
}
