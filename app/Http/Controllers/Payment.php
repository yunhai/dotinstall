<?php

namespace App\Http\Controllers;

use App\Models\User\User as UserModel;
use Auth;
use Request;

class Payment extends Base
{
    public function __construct(
        UserModel $user_model
    ) {
        $this->model = $user_model;
    }

    public function getCharge()
    {
        return $this->render('payment.charge');
    }

    public function getFinish()
    {
        return $this->render('payment.finish');
    }

    public function postCharge(Request $request)
    {
        $user_id = Auth::check() ? Auth::user()->id : 0;

        $input = Request::all();
        $token = $input['stripeToken'];

        $error = [];
        $flag = $this->model->charge($user_id, $token, $error);

        if ($flag) {
            return redirect()->route('payment.finish');
        }

        return redirect()->back()->with('error', $error);
    }

    public function getUpgrade(Request $request)
    {
        $user_id = Auth::check() ? Auth::user()->id : 0;
        $this->model->upgrade($user_id);

        dd('upgraded');
    }

    public function getCancel(Request $request)
    {
        $user_id = Auth::check() ? Auth::user()->id : 0;
        $this->model->cancel($user_id);
        dd('canceled');
    }
}
