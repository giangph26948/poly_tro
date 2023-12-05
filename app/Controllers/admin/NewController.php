<?php
class NewController extends BaseController
{

    private $newModel;
    private $categoryModel;
    private $facilityModel;

    public function __construct()
    {
        $this->model('NewModel');
        $this->model('CategoryModel');
        $this->model('FacilityModel');
        $this->newModel = new NewModel;
        $this->categoryModel = new CategoryModel;
        $this->facilityModel = new FacilityModel;
    }

    public function index()
    {
        $news = $this->newModel->getAllByFacility($_SESSION["admin"]['facility_id']);
        $categories = $this->categoryModel->getAll();
        $this->view('admin.layouts.new', [
            "news" => $news,
            "categories" => $categories,
        ]);
    }

    public function detail()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $facilities = $this->facilityModel->getAll();
            $categories = $this->categoryModel->getAll();
            $new = $this->newModel->getOne($id);
            $this->view('admin.layouts.newDetail', [
                "new" => $new,
                "facilities" => $facilities,
                "categories" => $categories
            ]);
        }
    }

    public function saveUpdate()
    {
        $id = $_GET["id"];
        $data = [
            "status" => 1,
        ];
        $this->newModel->updateNew($data, $id);
        header('location: http://localhost/poly_tro/admin/new');
    }

    public function deleteNewAdmin()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $this->newModel->deleteNewAdmin($id);
            header('location: http://localhost/poly_tro/admin/new');
        }
    }

    public function filter()
    {
        $status = $_GET["status"];
        $category = $_GET["category"];
        $data = $this->newModel->getAll("", "", [], true);
        $news = $this->newModel->filterStatusAndCategory($data, $status, $category);
        $categories = $this->categoryModel->getAll();

        $this->view('admin.layouts.new', [
            'news' => $news,
            "categories" => $categories
        ]);
    }
}