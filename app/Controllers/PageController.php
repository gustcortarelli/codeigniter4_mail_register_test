<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class PageController extends Controller {

    public function index() {
        return $this->view("email/register");
    }

    public function view($page = 'email/register') {

        if (!is_file(APPPATH . "/Views/{$page}.php")) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        echo view("templates/header");
        echo view($page);
        echo view("templates/footer");

    }

    

}