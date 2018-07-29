<?php

namespace App\Http\Controllers;

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
}
