<?php

namespace App\Http\Controllers\Client;

class Home
{
    public function dashboard()
    {
        return redirect()->route('client.affiliator_invitation.index');
    }
}
