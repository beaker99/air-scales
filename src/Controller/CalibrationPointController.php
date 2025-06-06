<?php

namespace App\Controller;

use App\Entity\CalibrationPoint;
use App\Form\CalibrationPointForm;
use App\Repository\CalibrationPointRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/calibration/point')]
final class CalibrationPointController extends AbstractController
{
    #[Route(name: 'app_calibration_point_index', methods: ['GET'])]
    public function index(CalibrationPointRepository $calibrationPointRepository): Response
    {
        $user = $this->getUser();

        if ($this->isGranted('ROLE_ADMIN')) {
            $calibrationPoints = $calibrationPointRepository->findAll();
        } else {
            $calibrationPoints = $calibrationPointRepository->findByUser($user);
        }

        return $this->render('calibration_point/index.html.twig', [
            'calibration_points' => $calibrationPoints,
        ]);
    }

    #[Route('/new', name: 'app_calibration_point_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $calibrationPoint = new CalibrationPoint();
        $form = $this->createForm(CalibrationPointForm::class, $calibrationPoint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($calibrationPoint);
            $entityManager->flush();

            return $this->redirectToRoute('app_calibration_point_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('calibration_point/new.html.twig', [
            'calibration_point' => $calibrationPoint,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_calibration_point_show', methods: ['GET'])]
    public function show(CalibrationPoint $calibrationPoint): Response
    {
        return $this->render('calibration_point/show.html.twig', [
            'calibration_point' => $calibrationPoint,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_calibration_point_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CalibrationPoint $calibrationPoint, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CalibrationPointForm::class, $calibrationPoint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_calibration_point_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('calibration_point/edit.html.twig', [
            'calibration_point' => $calibrationPoint,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_calibration_point_delete', methods: ['POST'])]
    public function delete(Request $request, CalibrationPoint $calibrationPoint, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$calibrationPoint->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($calibrationPoint);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_calibration_point_index', [], Response::HTTP_SEE_OTHER);
    }
}
