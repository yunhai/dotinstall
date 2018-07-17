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

    public function getContact()
    {
        return $this->render('page.contact');
    }

    public function getStripe()
    {
        return $this->render('page.stripe');
    }

    public function getAffiliate()
    {
        return $this->render('page.affiliate');
    }
}
