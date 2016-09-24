<?php

namespace Application\Controllers;

use Alien\Mvc\AbstractController;
use Alien\Mvc\Template;
use Application\Models\Admin\SidePanel;

class IndexController extends AbstractController
{

    private $cms;

    public function __construct() {
        parent::__construct();
    }

    protected function prepareView($action)
    {
        return new Template(__DIR__ . '/../views/index/' . str_replace('Action', '', $action) . '.phtml');
    }

    protected function indexAction()
    {
        $adminPanel = new SidePanel();
        $this->getView()->bindVariable('cms', $adminPanel);
        $this->getResponse()->setContent($this->getView()->render());
    }

}