<?php

namespace Application;

use Alien\Mvc\AbstractController;
use Alien\Mvc\Response;
use Alien\Routing\HttpRequest;
use Alien\Routing\Route;
use Alien\Routing\Router;
use Alien\Routing\Uri;
use Tracy\Debugger;

class Application extends \Alien\Application
{

    /**
     * @var Router
     */
    protected $router;

    public function run()
    {

        Debugger::enable();
        Debugger::$strictMode = TRUE;

        $this->router = $this->getServiceLocator()->get('Router');

        $uri = Uri::createFromString($this->getRequest()->getUri());
        $route = Route::createFromRouteConfiguration($this->router->getMatchedConfiguration($uri->getPath()));

        $req = $this->getRequest();
        if($req instanceof HttpRequest) {
            $req->setParams($route->getParams());
        }

        $controllerClass = $route->getControllerClass();
        /* @var $controller AbstractController */
        $controller = new $controllerClass;
        $controller->setServiceLocator($this->getServiceLocator());
        $controller->setRequest($this->getRequest());
        $controller->setRoute($route);
        $controller->addAction($route->getAction());
        /* @var $response Response */
        $response = $controller->getResponses()[0];

        http_response_code($response->getStatus());
        header('Content-Type: ' . $response->getContentType());
        $content = $response->getContent();
        if(strpos($response->getContentType(), 'json') !== false) {
            $content = json_encode($content);
        }
        echo $content;


    }

}