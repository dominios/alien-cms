<?php

namespace Application\Controllers;

use Alien\Mvc\AbstractController;
use Alien\Mvc\Template;
use Application\Models\Admin\SidePanel;
use Application\Models\Utils\Serializer;
use Application\Providers\Page\PageProvider;
use Application\Widgets\NewsList\NewsList;

class IndexController extends AbstractController
{

    private $cms;

    public function __construct()
    {
        parent::__construct();
    }

    protected function prepareView($action)
    {
        return new Template(__DIR__ . '/../views/index/' . str_replace('Action', '', $action) . '.phtml');
    }

    protected function indexAction()
    {
        $adminPanel = new SidePanel();

        /** @var PageProvider $pageProvider */
        $serializer = new Serializer();
        $pageProvider = $this->getServiceLocator()->get('\Application\Providers\Page\PageProvider');
        $pageJson = $pageProvider->get(1);
        $newsList = $pageJson['body']['main']['newsList'];
        $articles = array_map(function ($item) use ($serializer) {
            return $serializer->fromJson($item);
        }, $newsList);

        $newsListWidget = new NewsList($articles);

        $this->getView()->bindVariable('cms', $adminPanel);
        $this->getView()->bindVariable('newsList', $newsListWidget);
        $this->getResponse()->setContent($this->getView()->render());
    }

}