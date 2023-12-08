<?php class ThanksController extends BaseController
{
    private $data ;
    private $ordersId ;
    private $newModel ;
    private $orderModel ;
    public function __construct()
    {
        $this->data = $_GET['data'];
        $this->ordersId = $_GET['ordersId'];
        $this->model('NewModel');
        $this->newModel = new NewModel;
        $this->model('OrderModel');
        $this->orderModel = new OrderModel;
    }
    public function index()
    {
        $this->newModel->updateIsrent($this->data);
        $this->orderModel->updateStatus($this->ordersId);
        $this->view('site.layouts.thanks');
    }
    public function thanks(){
        header("location: http://localhost/poly_tro/site/thanks");
    }
}