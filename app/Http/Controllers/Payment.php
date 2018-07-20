<?php

namespace App\Http\Controllers;

use App\Models\User\User as UserModel;
use Request;

class Payment extends Base
{
    public function __construct(
        UserModel $user_model
    ) {
        $this->model = $user_model;
    }

    public function postCharge(Request $request)
    {
        $input = Request::all();

        $token = $input['stripeToken'];
        $this->model->charge($token);
        //
        // dd('done');
    }

    public function getUpgrade(Request $request)
    {
        // $input = Request::all();
        // $token = $input['stripeToken'];
        $this->model->upgrade();

        dd('upgraded');
    }

    public function getCancel(Request $request)
    {
        // $input = Request::all();
        // $token = $input['stripeToken'];
        $this->model->cancel();

        dd('canceled');
    }
}
