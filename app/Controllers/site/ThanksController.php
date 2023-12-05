<?php class ThanksController extends BaseController
{
    public function index()
    {
        $this->view('site.layouts.thanks');
    }
    public function thanks(){
        header("location: http://localhost/poly_tro/site/thanks");
    }
}