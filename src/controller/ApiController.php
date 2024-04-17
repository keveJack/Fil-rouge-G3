<?php
declare (strict_types = 1);
namespace app\FilRougeG3\controller;

use app\FilRougeG3\model\EvenementCollection;
use app\FilRougeG3\model\PersonnageCollection;
use app\FilRougeG3\model\RangCollection;
use app\FilRougeG3\model\SignalementCollection;
use app\FilRougeG3\model\ZoneCollection;

class ApiController extends BaseController
{
    public function index()
    {
        $this->addParam('message', "Salut");
        $this->view('api/index');
    }
    public function evenements()
    {
        $this->addParam('liste', EvenementCollection::lister());
        $this->view('api/evenementCollection');
    }
    public function personnages()
    {
        $this->addParam('liste', PersonnageCollection::lister());
        $this->view('api/personnageCollection');
    }
    public function rangs()
    {
        $this->addParam('liste', RangCollection::lister());
        $this->view('api/rangCollection');
    }
    public function signalements()
    {
        $this->addParam('liste', SignalementCollection::lister());
        $this->view('api/signalementCollection');
    }
    public function zones()
    {
        $this->addParam('liste', ZoneCollection::getZones());
        $this->view('api/zoneCollection');
    }
}
