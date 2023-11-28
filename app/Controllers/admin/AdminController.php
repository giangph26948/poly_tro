<?php
    class AdminController extends BaseController {

        private $facilityModel;

        public function __construct()
        {    
            $this->model('FacilityModel');
            $this->facilityModel = new FacilityModel;
        }

        public function index() {
            $facilities = $this->facilityModel->getAll();
            $this -> view('admin.index', [
                "facilities" => $facilities
            ]);
        }
    }