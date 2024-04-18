<?php
declare (strict_types = 1);
namespace app\FilRougeG3\controller;


class InscriptionController extends BaseController
{
    public function index()
    {
        $this->view('inscription/index');
    }
    
}
