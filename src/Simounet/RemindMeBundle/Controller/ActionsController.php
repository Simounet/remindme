<?php

namespace Simounet\RemindMeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Simounet\RemindMeBundle\Entity\Item;
use Simounet\RemindMeBundle\Entity\Entries,
    Simounet\RemindMeBundle\Form\EntriesType;

class ActionsController extends Controller
{

    public function addAction(Request $request)
    {
        $entries = new Entries();
        $form = $this->createForm(EntriesType::class, $entries);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entries);
            $em->flush();
            $request
                ->getSession()
                ->getFlashBag()
                ->add('success', 'Saved');
            return $this->redirect($this->generateUrl('simounet_remindme_homepage'));
        }
        return $this->render('SimounetRemindMeBundle:Actions:add.html.twig', array(
            'form' => $form->createView()
        ));
    }
}

