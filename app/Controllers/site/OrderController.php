<?php
class OrderController extends BaseController
{

    private $orderModel;
    private $newModel;

    public function __construct()
    {
        $this->model('OrderModel');
        $this->orderModel = new OrderModel;
        $this->model('NewModel');
        $this->newModel = new NewModel;
    }

    public function index()
    {

        $new_id = $_GET["id"];
        $user_id = $_SESSION["auth"]['id'];
        $orders = $this->orderModel->getAll();
        $check = false;
        $item = null;
        foreach ($orders as $order) {
            if ($order['user_id'] == $user_id) {
                $check = true;
                $item = $order;
                break;
            }
        }
        if ($check) {
            $order_id = $item['id'];
            $data = [
                "new_id" => $new_id,
                "order_id" => $order_id,
                "status" => 0,
                "created_at" => date("Y-m-d H:i:s")
            ];
            $this->orderModel->createOrderItem($data);
            header("location: http://localhost/poly_tro/site/account/order");
        } else {
            return $this->view("site.layouts.order");
        }
    }
    public function saveOrder()
    {
        $new_id = $_GET["id"];
        $user_id = $_SESSION["auth"]['id'];
        $fullname = $_POST["fullname"];
        $cccd = $_POST["cccd"];
        $student_id = $_POST["student_id"];
        $phone_number = $_POST["phone_number"];
        $data = [
            "user_id" => $user_id,
            "fullname" => $fullname,
            "cccd" => $cccd,
            "student_id" => $student_id,
            "phone_number" => $phone_number
        ];
        $this->orderModel->createOrder($data);
        $orders = $this->orderModel->getAll();
        $item = null;
        foreach ($orders as $order) {
            if ($order['user_id'] == $user_id) {
                $item = $order;
                break;
            }
        }
        $data2 = [
            "new_id" => $new_id,
            "order_id" => $item['id'],
            "status" => 0,
            "created_at" => date("Y-m-d H:i:s")
        ];
        $this->orderModel->createOrderItem($data2);
        header("location: http://localhost/poly_tro/site/account/order");
    }

    public function deleteOrder()
    {
        $id = $_GET["id"];
        $this->orderModel->deleteOrder($id);
        header('location: http://localhost/poly_tro/site/account/order');
    }
}