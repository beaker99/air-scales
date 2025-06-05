<?php

namespace App\Controller;

use App\Entity\Device;
use App\Form\DeviceTypeForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/device')]
final class DeviceController extends AbstractController
{
    #[Route('/{id<\d+>}/edit', name: 'app_device_edit')]
    public function edit(Device $device, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(DeviceTypeForm::class, $device);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'Device updated successfully!');
            return $this->redirectToRoute('app_dashboard');
        }

        return $this->render('device/edit.html.twig', [
            'form' => $form->createView(),
            'device' => $device,
        ]);
    }
}