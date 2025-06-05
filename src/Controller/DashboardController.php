<?php

namespace App\Controller;

use App\Repository\DeviceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;


class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(DeviceRepository $deviceRepo, Security $security): Response
    {
        $user = $security->getUser();

        if ($this->isGranted('ROLE_ADMIN')) {
            $devices = $deviceRepo->findBy([], ['id' => 'DESC']);
        } else {
            $devices = $deviceRepo->findBy(
                ['sold_to' => $user],
                ['id' => 'DESC']
            );
        }

        return $this->render('dashboard/index.html.twig', [
            'devices' => $devices,
        ]);
    }
}