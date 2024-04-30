<?php


class Abouts extends Controller
{

    public function __construct(){

    }
    public function about()
    {

        

        $this->view('abouts/about');

    }

}