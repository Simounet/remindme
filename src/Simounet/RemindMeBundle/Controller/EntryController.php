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
            $user = $this->get('security.token_storage')->getToken()->getUser();
            $entry->setUserId($user->getId());
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
        return $this->render('SimounetRemindMeBundle:Entry:all.html.twig', array(
            'entries' => $this->search()
        ));
    }

    public function searchAction( $field, $value )
    {
        return $this->render('SimounetRemindMeBundle:Entry:search.html.twig', array(
            'entries' => $this->search( array($field => $value) )
        ));
    }

    protected function search( $search = array() )
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $entryRepository = $this->getDoctrine()->getRepository('SimounetRemindMeBundle:Entry');
        $search = array_merge(
            array('userId' => $user->getId()),
            $search
        );
        return $entryRepository->findBy($search, array('date' => 'DESC'));
    }
}

