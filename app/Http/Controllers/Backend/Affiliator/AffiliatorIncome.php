<?php

namespace App\Http\Controllers\Backend\Affiliator;

use App\Http\Controllers\Backend\Base;
use App\Models\Backend\Affiliator\AffiliatorIncome as AffiliatorIncomeModel;
use Illuminate\Http\Request;

class AffiliatorIncome extends Base
{
    public function __construct(
        AffiliatorIncomeModel $model
    ) {
        $this->model = $model;
    }

    public function getIndex(Request $request, int $affiliator_id)
    {
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
}
