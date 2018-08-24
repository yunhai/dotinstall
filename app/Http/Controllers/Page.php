<?php

namespace App\Http\Controllers;

use App\Http\Service\UtmTracking\UtmTrackingService;
use Illuminate\Http\Request;

class Page extends Base
{
    public function getCompany()
    {
        return $this->render('page.company');
    }

    public function getTerms()
    {
        return $this->render('page.terms');
    }

    public function getPrivacy()
    {
        return $this->render('page.privacy');
    }

    public function getAffiliate()
    {
        return $this->render('page.affiliate');
    }
    
    public function getA8(Request $request)
    {
        $user_id = $request->get('user_id');

        if ($user_id) {
            $service = new UtmTrackingService();
            $service->webhook($user_id, []);
        }

        dd('done');
    }
}
