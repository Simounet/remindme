<?php

namespace Simounet\RemindMeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($notice = false)
    {
        $entriesRepository = $this->getDoctrine()->getRepository('SimounetRemindMeBundle:Entries');
        return $this->render('SimounetRemindMeBundle:Default:index.html.twig', array(
            'items' => $entriesRepository->findBy(array(), array('date' => 'DESC'))
        ));
    }
}
