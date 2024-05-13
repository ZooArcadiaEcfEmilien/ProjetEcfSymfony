<?php

namespace App\Controller\Admin;

use App\Entity\UserAccesEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\HttpFoundation\RedirectResponse;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;

class UserAccesEntityCrudController extends AbstractCrudController
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
        return UserAccesEntity::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
