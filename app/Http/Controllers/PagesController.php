<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex(){

    	 return view('pages.index');
    }

    public function getRegisterPage(){
    	return view('pages.register');
    }

    public function getLoginPage(){
    	return view('pages.login');
    }

    public function getAboutPage(){
    	return view('pages.about');
    }

    public function getFaqPage(){
    	return view('pages.faq');
    }

    public function getPrivacyPage(){
        return view('pages.privacy');
    }

    public function getMarketplacePage(){
        return view('pages.marketplace');
    }

    public function getOffersPage(){
        return view('pages.offers');
    }
}
