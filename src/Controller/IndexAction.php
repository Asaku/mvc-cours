<?php

namespace Blog\Controller;

/**
 * Class IndexAction
 * @package src\Controller
 */
class IndexAction extends MasterController implements ActionInterface
{
    public function renderAction()
    {
        $this->render("index");
    }
}
