<?php

namespace App\Controller\Admin;

use App\Entity\AnimalEntity;
use App\Entity\AvisEntity;
use App\Entity\FormulaireEntity;
use App\Entity\HabitatEntity;
use App\Entity\ServiceTabEntity;
use App\Entity\UserTabEntity;
use App\Entity\Horaires;
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
        $roles = $this->getUser()->getRoles();

        yield MenuItem::linkToCrud('Animals', 'fas fa-paw', AnimalEntity::class);

        yield MenuItem::linkToCrud('Avis', 'fas fa-star', AvisEntity::class)
            ->setPermission(in_array('', $roles) || in_array('ROLE_VETERINAIRE', $roles));

        yield MenuItem::linkToCrud('Formulaires', 'fas fa-file-alt', FormulaireEntity::class)
            ->setPermission(in_array('', $roles) || in_array('ROLE_VETERINAIRE', $roles));

        yield MenuItem::linkToCrud('Habitats', 'fas fa-home', HabitatEntity::class)
            ->setPermission(in_array('ROLE_EMPLOYE', $roles));

        yield MenuItem::linkToCrud('Services', 'fas fa-concierge-bell', ServiceTabEntity::class)
            ->setPermission(in_array('ROLE_VETERINAIRE', $roles));

        yield MenuItem::linkToCrud('UserTab', 'fas fa-table', UserTabEntity::class)
            ->setPermission(in_array('ROLE_EMPLOYE', $roles) || in_array('ROLE_VETERINAIRE', $roles));

        yield MenuItem::linkToCrud('Horaires', 'fas fa-calendar-alt', Horaires::class)
            ->setPermission(in_array('ROLE_VETERINAIRE', $roles));
    }
}
