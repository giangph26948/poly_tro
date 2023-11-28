<?php
class AuthController extends BaseController
{

    private $authModel;

    public function __construct()
    {
        $this->model('AuthModel');
        $this->authModel = new AuthModel;
    }

    public function index()
    {
        $users = $this->authModel->getAllByFacility($_SESSION["admin"]['facility_id']);
        $this->view('admin.layouts.auth', [
            'users' => $users
        ]);
    }
    public function deleteUser()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $this->authModel->deleteUser($id);
            header("location: http://localhost/poly_tro/admin/auth");
        }
    }

    public function filter()
    {
        if (isset($_GET["role"])) {
            $role = $_GET["role"];
            $data = $this->authModel->getAll();
            $users = $this->authModel->filterOnlyRole($data, $role);
            $this->view('admin.layouts.auth', [
                'users' => $users
            ]);
        }
    }
}