<?php

namespace Simounet\RemindMeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Simounet\RemindMeBundle\Entity\Item;
use Simounet\RemindMeBundle\Entity\Entry,
    Simounet\RemindMeBundle\Form\EntryType;

class EntryController extends Controller
{

    public function addAction(Request $request)
    {
        $entry = new Entry();
        $form = $this->createForm(EntryType::class, $entry, array(
            'action' => $this->generateUrl('entry_add')
        ));

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entry);
            $em->flush();
            $request
                ->getSession()
                ->getFlashBag()
                ->add('success', 'Saved');
            return $this->redirect($this->generateUrl('homepage'));
        }
        return $this->render('SimounetRemindMeBundle:Entry:add.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function allAction()
    {
        $entryRepository = $this->getDoctrine()->getRepository('SimounetRemindMeBundle:Entry');
        return $this->render('SimounetRemindMeBundle:Entry:all.html.twig', array(
            'entries' => $entryRepository->findBy(array(), array('date' => 'DESC'))
        ));
    }
}

