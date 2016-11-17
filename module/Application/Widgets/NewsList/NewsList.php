<?php

namespace Application\Widgets\NewsList;

class NewsList extends \Alien\Mvc\Template
{

    public function __construct($articles)
    {
        parent::__construct(__DIR__ . '/template.phtml', [
            'articles' => $articles
        ]);
    }

}