<?php

namespace App\Http\Controllers;

use App\Http\Service\UtmTracking\UtmTrackingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
        $q = 'select media.id, media.path, extension FROM media WHERE media.extension = "mp4"';
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
    
    public function getCleanUpPoster()
    {
        $delete_flag = request()->get('delete_flag');
        
        $q = 'select lesson_details.id, lesson_details.poster, media.id, media.path 
        FROM lesson_details, media 
        WHERE lesson_details.poster = media.id and lesson_details.deleted_at is null';
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
    
    public function getResizePoster()
    {
        $resize = request()->get('resize');
        
        $q = 'select lesson_details.id, lesson_details.poster, media.* 
        FROM lesson_details, media 
        WHERE lesson_details.poster = media.id and lesson_details.deleted_at is null';
        $list = \DB::select($q);
        
        $resized = [];
        foreach ($list as $item) {
            $location = $item->location;
            $extension = substr($item->hash_name, strrpos($item->hash_name, '.'));
            $bk_name = substr($item->hash_name, 0, strrpos($item->hash_name, '.')) . '_original' . $extension;
        
            $old = Storage::disk('media')->path("{$item->path}");
            $new = Storage::disk('media')->path("{$location}/{$bk_name}");
            
            if (in_array($old, $resized)) {
                continue;
            }
            array_push($resized, $old);
            // ngang 210
            // cao 120
            print_r('<pre>');
            print_r($old);
            print_r('</pre>');
            if ($resize && file_exists($old)) {
                print_r('<pre>move:');
                print_r($old);
                print_r('</pre>');
                copy($old, $new);
                Image::make($old)
                    ->resize(210, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->save($old);
            }
        }
        dd('done');
    }
}
