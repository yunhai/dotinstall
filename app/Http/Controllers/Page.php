<?php

namespace App\Http\Controllers;

use App\Http\Service\UtmTracking\UtmTrackingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    
    public function getCleanUpVideo()
    {
        $delete_flag = request()->get('delete_flag');
        
        $q = 'select lesson_details.id, lesson_details.video, media.id, media.path FROM lesson_details, media WHERE lesson_details.video = media.id';
        $list = \DB::select($q);
        foreach ($list as $item) {
            print_r('<pre>');
            print_r(Storage::disk('media')->path($item->path));
            print_r('</pre>');
            if ($delete_flag) {
                Storage::disk('media')->delete($item->path);
            }
        }

        dd('done');
    }
}
