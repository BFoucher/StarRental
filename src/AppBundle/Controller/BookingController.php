<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Booking;
use AppBundle\Form\BookingType;

/**
 * Booking controller.
 *
 * @Route("/booking")
 */
class BookingController extends Controller
{
    /**
     * Lists all Booking entities.
     *
     * @Route("/", name="booking_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bookings = $em->getRepository('AppBundle:Booking')->findAll();

        return $this->render('booking/index.html.twig', array(
            'bookings' => $bookings,
        ));
    }

    /**
     * Creates a new Booking entity.
     *
     * @Route("/new", name="booking_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $booking = new Booking();
        //By Default use today Date;
        $booking->setDateStart(new \DateTime());
        $booking->setDateEnd(new \DateTime());
        $form = $this->createForm('AppBundle\Form\BookingType', $booking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //Never trust the client
            if ($booking->getOutclassed()){
                $canOutclass = $this->get('app.outclass')->canOutclass($booking->getShip(),$booking->getCustomer());
                if (!$canOutclass){
                    $booking->setOutclassed(0);
                }

            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($booking);
            $em->flush();

            return $this->redirectToRoute('booking_show', array('id' => $booking->getId()));
        }

        return $this->render('booking/new.html.twig', array(
            'booking' => $booking,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Booking entity.
     *
     * @Route("/{id}", name="booking_show")
     * @Method("GET")
     */
    public function showAction(Booking $booking)
    {
        $deleteForm = $this->createDeleteForm($booking);

        return $this->render('booking/show.html.twig', array(
            'booking' => $booking,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Booking entity.
     *
     * @Route("/{id}/edit", name="booking_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Booking $booking)
    {
        $deleteForm = $this->createDeleteForm($booking);
        $editForm = $this->createForm('AppBundle\Form\BookingType', $booking);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($booking);
            $em->flush();

            return $this->redirectToRoute('booking_edit', array('id' => $booking->getId()));
        }

        return $this->render('booking/edit.html.twig', array(
            'booking' => $booking,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Booking entity.
     *
     * @Route("/{id}", name="booking_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Booking $booking)
    {
        $form = $this->createDeleteForm($booking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($booking);
            $em->flush();
        }

        return $this->redirectToRoute('booking_index');
    }

    /**
     * Creates a form to delete a Booking entity.
     *
     * @param Booking $booking The Booking entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Booking $booking)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('booking_delete', array('id' => $booking->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
