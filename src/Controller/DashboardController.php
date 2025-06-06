<?php

namespace App\Controller;

use App\Repository\CalibrationPointRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(CalibrationPointRepository $calibrationRepo): Response
    {
        $user = $this->getUser();
        $calibrationPoints = $calibrationRepo->findByUser($user);

        return $this->render('dashboard/index.html.twig', [
            'calibration_points' => $calibrationPoints,
        ]);
    }
}