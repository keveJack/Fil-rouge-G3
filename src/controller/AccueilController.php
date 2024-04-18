<?php
declare (strict_types = 1);
namespace app\FilRougeG3\controller;


class AccueilController extends BaseController
{
    public function index()
    {
        $this->view('accueil/index');
    }
    public function indexConnecte()
    {

        $this->view('api/indexConnecte');
    }
}
