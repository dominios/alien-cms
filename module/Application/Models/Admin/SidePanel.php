<?php

namespace Application\Models\Admin;

/**
 * Class SidePanel.
 */
class SidePanel extends \Alien\Mvc\Template
{
    public function __construct ()
    {
        parent::__construct(__DIR__ . '/../../views/cms/cms.phtml', []);
    }
}