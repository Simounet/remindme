<?php

namespace Simounet\RemindMeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($notice = false)
    {
        return $this->render('SimounetRemindMeBundle:Default:index.html.twig');
    }
}
