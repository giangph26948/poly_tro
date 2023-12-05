<?php
class OrderController extends BaseController
{

    private $orderModel;
    private $categoryModel;

    public function __construct()
    {
        $this->model('OrderModel');
        $this->model('CategoryModel');
        $this->orderModel = new OrderModel;
        $this->categoryModel = new CategoryModel;
    }

    public function index()
    {
        $orders = $this->orderModel->getAll($_SESSION["admin"]['facility_id']);
        $this->view('admin.layouts.order', [
            'orders' => $orders
        ]);
    }

    public function detail()
    {
        $id = $_GET["id"];
        $order = $this->orderModel->getOne($id);
        $orders_item = $this->orderModel->getAllDetail($order['user_id']);
        $categories = $this->categoryModel->getAll();
        $this->view('admin.layouts.orderDetail', [
            'orders_item' => $orders_item,
            'categories' => $categories
        ]);
    }

    public function accept()
    {
        $id = $_GET["id"];
        $data = [
            "status" => 1
        ];
        $this->orderModel->updateOrderItem($data, $id);
        header("location: http://localhost/poly_tro/admin/order");
    }

    public function deleteOrder()
    {
        $id = $_GET["id"];
        $this->orderModel->deleteOrder($id);
        header('location: http://localhost/poly_tro/admin/order');
    }

    public function filter()
    {
        $id = $_GET["id"];
        $status = $_GET["status"];
        $category = $_GET["category"];
        $order = $this->orderModel->getOne($id);
        $data = $this->orderModel->getAllDetail($order['user_id']);
        // echo "<pre>";
        // print_r($data);
        // die;
        $orders_item = $this->orderModel->filterStatusAndCategory($data, $status, $category);
        $categories = $this->categoryModel->getAll();

        $this->view('admin.layouts.orderDetail', [
            'orders_item' => $orders_item,
            "categories" => $categories
        ]);
    }
}