<?php

namespace App\Controller\Admin;

use App\Entity\ServiceTabEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ServiceTabEntityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ServiceTabEntity::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('serviceNom'),
            TextField::new('serviceTitre'),
            TextEditorField::new('serviceDescription'),
            TextField::new('serviceImage'),
        ];
    }
    
}
