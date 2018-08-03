<?php

namespace App\Http\Controllers\Client\Affiliator;

use App\Http\Controllers\Client\Base;
use App\Models\Client\Affiliator\Affiliator as AffiliatorModel;
use App\Models\Client\Affiliator\AffiliatorIncome as AffiliatorIncomeModel;
use Auth;
use Illuminate\Http\Request;

class AffiliatorIncome extends Base
{
    public function __construct(
        AffiliatorIncomeModel $model,
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
        $query = $this->model->where('affiliator_id', $affiliator_id);

        $year = 0;
        $month = 0;
        if ($input) {
            $year = $input['year'] ?? 0;
            $month = $input['month'] ?? 0;
            if ($year) {
                if ($month) {
                    $query->where('target_date', 'like', "{$year}-{$month}-%");
                } else {
                    $query->where('target_date', 'like', "{$year}-%");
                }
            }
        }

        $data = $query
                    ->orderBy('id', 'desc')
                    ->paginate(100);

        $form = array_merge($this->form($data), compact('year', 'month'));

        return $this->render('affiliator.affiliator_income.index', compact('data', 'form'));
    }

    private function form($data)
    {
        return [];
    }
    private function getAffiliator()
    {
        $user_id = Auth::user()->id;
        return $this->affiliator_model->getByUserId($user_id);
    }
}
