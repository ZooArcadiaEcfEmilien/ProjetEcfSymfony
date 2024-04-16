<?php

namespace App\Controller\Admin;

use App\Entity\AnimalEntity;
use App\Entity\AvisEntity;
use App\Entity\FormulaireEntity;
use App\Entity\HabitatEntity;
use App\Entity\ServiceTabEntity;
use App\Entity\UserAccesEntity;
use App\Entity\UserTabEntity;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {



        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(AnimalEntityCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Gestion Administration du Zoo Arcadia');
    }

    public function configureMenuItems(): iterable
    {
         yield MenuItem::linkToCrud('AnimalEntity', 'fas fa-animal', AnimalEntity::class);
        yield MenuItem::linkToCrud('AvisEntity','fas fa-avis', AvisEntity::class);
         yield MenuItem::linkToCrud('FormulaireEntity','fas fa-formulaire', FormulaireEntity::class);
         yield MenuItem::linkToCrud('HabitatEntity','fas fa-habitat',HabitatEntity::class);
         yield MenuItem::linkToCrud('ServiceEntity','fas fa-service', ServiceTabEntity::class);
         yield MenuItem::linkToCrud('UserAccesEntity','fas fa-userAcces', UserAccesEntity::class);
         yield MenuItem::linkToCrud('UserTabEntity','fas fa-userTab', UserTabEntity::class);
         
    }
}
