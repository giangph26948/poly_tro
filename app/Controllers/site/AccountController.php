<?php
class AccountController extends BaseController
{

    private $newModel;
    private $authModel;
    private $orderModel;
    private $categoryModel;
    private $facilityModel;
    private $permissionModel;

    public function __construct()
    {
        $this->model('NewModel');
        $this->model('AuthModel');
        $this->model('OrderModel');
        $this->model('CategoryModel');
        $this->model('FacilityModel');
        $this->model('PermissionModel');
        $this->newModel = new NewModel;
        $this->authModel = new AuthModel;
        $this->orderModel = new OrderModel;
        $this->categoryModel = new CategoryModel;
        $this->facilityModel = new FacilityModel;
        $this->permissionModel = new PermissionModel;
    }

    public function index()
    {
        if (isset($_GET["signIn"])) {
            return $this->view('site.layouts.signIn');
        }
        if (isset($_GET["signUp"])) {
            $facilities = $this->facilityModel->getAll();
            return $this->view('site.layouts.signUp', [
                "facilities" => $facilities
            ]);
        }
        if (isset($_GET["forgot"])) {
            return $this->view('site.layouts.forgot');
        }
        $news = $this->newModel->getAll("", $_SESSION["auth"]['id']);
        if ($_SESSION["auth"]['role'] == 1) {
            return $this->view('site.layouts.accountManage.index', [
                "news" => $news
            ]);
        } else {
            $user = $this->authModel->getOne($_SESSION["auth"]['id']);
            return $this->view('site.layouts.accountManage.profile', [
                "user" => $user
            ]);
        }
    }

    public function updateNew()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $facilities = $this->facilityModel->getAll();
            $categories = $this->categoryModel->getAll();
            $new = $this->newModel->getOne($id);
            return $this->view("site.layouts.accountManage.updateNew", [
                "new" => $new,
                "facilities" => $facilities,
                "categories" => $categories,
            ]);
        }
    }

    public function saveUpdateNew()
    {
        $id = $_GET["id"];
        $new = $this->newModel->getOne($id);
        $title = $_POST["title"];
        $address = $_POST["address"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $area = $_POST["area"];
        $number_people = $_POST["number_people"];
        $images = $_FILES["images"];
        $facility_id = $_POST["facility"];
        $category_id = $_POST["category"];
        $image = $this->upload_image($images, $new['image']);
        $data = [
            "title" => $title,
            "address" => $address,
            "description" => $description,
            "image" => $image,
            "price" => $price,
            "area" => $area,
            "number_people" => $number_people,
            "category_id" => $category_id,
            "facility_id" => $facility_id,
            "updated_at" => date("Y-m-d H:i:s"),
        ];
        $this->newModel->updateNew($data, $id);
        header('location: http://localhost/poly_tro/site/account');
    }

    public function deleteNew()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $this->newModel->deleteNew($id);
            header('location: http://localhost/poly_tro/site/account');
        }
    }

    public function postNew()
    {
        $facilities = $this->facilityModel->getAll();
        $categories = $this->categoryModel->getAll();
        return $this->view('site.layouts.accountManage.postNew', [
            "facilities" => $facilities,
            "categories" => $categories,
        ]);
    }

    public function profile()
    {
        $facilities = $this->facilityModel->getAll();
        $user = $this->authModel->getOne($_SESSION["auth"]['id']);
        return $this->view('site.layouts.accountManage.profile', [
            "user" => $user,
            "facilities" => $facilities
        ]);
    }

    public function order()
    {
        $orders = $this->orderModel->getAllDetail($_SESSION["auth"]['id']);
        return $this->view('site.layouts.accountManage.order', [
            "orders" => $orders
        ]);
    }

    public function saveProfile()
    {
        $fullname = $_POST["fullname"];
        $address = $_POST["address"];
        $email = $_POST["email"];

        $file = $_FILES['image'];

        if ($file['size'] == 0) {
            $data = $this->authModel->getOne($_SESSION["auth"]['id']);
            $image = $data['image'];
        } else {
            $image = "./public/uploads/" . $file['name'];
            move_uploaded_file($file['tmp_name'], $image);
            $image = "/public/uploads/" . $file['name'];
        }

        $data = [
            "fullname" => $fullname,
            "address" => $address,
            "email" => $email,
            "image" => $image,
            "updated_at" => date("Y-m-d H:i:s"),
        ];
        $this->authModel->updateUser($data, $_SESSION["auth"]['id']);
        header('location: http://localhost/poly_tro/site/account/profile');
    }

    public function changePassword()
    {
        if (isset($_SESSION["auth"])) {
            $user = $this->authModel->getOne($_SESSION["auth"]['id']);
            return $this->view("site.layouts.accountManage.changePassword", [
                "user" => $user
            ]);
        }
    }

    public function saveChangePassword()
    {
        $oldPass = $_POST["oldPassword"];
        $newPass = $_POST["newPassword"];
        $reNewPass = $_POST["reNewPassword"];

        $check = $this->authModel->checkPassword($oldPass, $newPass, $reNewPass);

        if ($check) {
            $data = [
                "password" => $newPass
            ];
            $this->authModel->updateUser($data, $_SESSION["auth"]['id']);
            header('location: http://localhost/poly_tro/site/account/profile');
        } else {
            header('location: http://localhost/poly_tro/site/account/changePassword?error');
        }
    }

    public function permission()
    {
        return $this->view("site.layouts.accountManage.permission");
    }

    public function savePermission()
    {
        $user_id = $_SESSION["auth"]['id'];
        $fullname = $_POST["fullname"];
        $cccd = $_POST["cccd"];
        $address = $_POST["address"];
        $phone_number = $_POST["phone_number"];
        $images = $_FILES["images"];
        $image = $this->upload_image($images);
        $data = [
            "user_id" => $user_id,
            "fullname" => $fullname,
            "cccd" => $cccd,
            "image_cccd" => $image,
            "address" => $address,
            "phone_number" => $phone_number
        ];
        $this->permissionModel->createPermission($data);
        header('location: http://localhost/poly_tro/site/account/profile');
    }
}