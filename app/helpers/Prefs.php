<?php

class Prefs {

    public static $category;
    public static $faqcategory;
    public static $principal;
    public static $agent;


    public function __construct()
    {

    }

    public static function getCategory(){
        $c = Category::get();

        self::$category = $c;
        return new self;
    }

    public function catToSelection($value, $label, $all = true)
    {
        if($all){
            $ret = array(''=>'All');
        }else{
            $ret = array();
        }

        foreach (self::$category as $c) {
            $ret[$c->{$value}] = $c->{$label};
        }


        return $ret;
    }

    public function catToArray()
    {
        return self::$category;
    }

    public static function getPrincipal(){
        $c = Principal::get();

        self::$principal = $c;
        return new self;
    }

    public function principalToSelection($value, $label, $all = true)
    {
        if($all){
            $ret = array(''=>'All');
        }else{
            $ret = array();
        }

        foreach (self::$principal as $c) {
            $ret[$c->{$value}] = $c->{$label};
        }


        return $ret;
    }

    public function principalToArray()
    {
        return self::$principal;
    }


    public static function getAgent(){
        $c = Agent::get();

        self::$agent = $c;
        return new self;
    }

    public function agentToSelection($value, $label, $all = true)
    {
        if($all){
            $ret = array(''=>'All');
        }else{
            $ret = array();
        }

        foreach (self::$agent as $c) {
            if($label == 'fullname'){
                $ret[$c->{$value}] = $c->firstname.' '.$c->lastname;
            }else{
                $ret[$c->{$value}] = $c->{$label};
            }
        }

        return $ret;
    }

    public function agentToArray()
    {
        return self::$agent;
    }


    public static function getFAQCategory(){
        $c = Faqcat::get();

        self::$faqcategory = $c;
        return new self;
    }

    public function FAQcatToSelection($value, $label, $all = true)
    {
        if($all){
            $ret = array(''=>'All');
        }else{
            $ret = array();
        }

        foreach (self::$faqcategory as $c) {
            $ret[$c->{$value}] = $c->{$label};
        }


        return $ret;
    }

    public function FAQcatToArray()
    {
        return self::$faqcategory;
    }



    public static function themeAssetsUrl()
    {
        return URL::to('/').'/'.Theme::getCurrentTheme();
    }

    public static function themeAssetsPath()
    {
        return 'themes/'.Theme::getCurrentTheme().'/assets/';
    }

    public static function getActiveTheme()
    {
        return Config::get('kickstart.default_theme');
    }

}
