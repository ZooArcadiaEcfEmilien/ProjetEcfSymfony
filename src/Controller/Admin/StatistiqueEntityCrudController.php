<?php

namespace App\Controller\Admin;

use App\Entity\StatistiqueEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\HttpFoundation\RedirectResponse;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;

class StatistiqueEntityCrudController extends AbstractCrudController
{
    public function index(AdminContext $context)
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('admin');
        }
        // Continuer avec l'affichage de la page normalement
        return parent::index($context);
    }


    public static function getEntityFqcn(): string
    {
        return StatistiqueEntity::class;
    }

}
