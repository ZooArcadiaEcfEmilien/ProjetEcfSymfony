<?php

namespace App\Controller\Admin;

use App\Entity\ServiceTabEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;


class ServiceTabEntityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ServiceTabEntity::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('serviceNom','Nom du service'),
            TextField::new('serviceTitre', 'Titre choisi pour le site'),
            TextEditorField::new('serviceDescription', 'Description de l\'habitat'),
            ImageField::new('serviceImage', 'Insérer une image')->setUploadDir('/public/uploads/images/Services')->setBasePath('/uploads/images/Services'),
        ];
    }
}
