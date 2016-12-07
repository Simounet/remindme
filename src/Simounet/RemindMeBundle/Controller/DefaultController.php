<?php

namespace Simounet\RemindMeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($notice = false)
    {
        $entryRepository = $this->getDoctrine()->getRepository('SimounetRemindMeBundle:Entry');
        return $this->render('SimounetRemindMeBundle:Default:index.html.twig', array(
            'items' => $entryRepository->findBy(array(), array('date' => 'DESC'))
        ));
    }
}
