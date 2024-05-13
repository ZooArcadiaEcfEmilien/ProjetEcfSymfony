<?php

namespace App\Controller\Admin;

use App\Entity\ServiceTabEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;

class ServiceTabEntityCrudController extends AbstractCrudController
{
    public function index(AdminContext $context)
    {
        if (!$this->isGranted('ROLE_ADMIN') && !$this->isGranted('ROLE_EMPLOYE')) {
            return $this->redirectToRoute('admin');
        }
        // Continuer avec l'affichage de la page normalement
        return parent::index($context);
    }
    public function configureActions(Actions $actions): Actions
    {
        $actions->add(Crud::PAGE_INDEX, Action::DETAIL);
        return $actions;
    }

    public static function getEntityFqcn(): string
    {
        return ServiceTabEntity::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('serviceNom', 'Nom du service'),
            TextField::new('serviceTitre', 'Titre choisi pour le site'),
            TextEditorField::new('serviceDescription', 'Description du service'),
            ImageField::new('serviceImage', 'Insérer une image')->setUploadDir('/public/uploads/images/Services'),
        ];
    }


}
