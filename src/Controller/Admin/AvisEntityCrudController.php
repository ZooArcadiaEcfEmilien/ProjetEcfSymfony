<?php

namespace App\Controller\Admin;

use App\Entity\AvisEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;


class AvisEntityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AvisEntity::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            BooleanField::new('validationAvis', 'Valider l\'avis ?'),
            IntegerField::new('nombreEtoileAvis'),
            TextField::new('pseudoAvis'),
            TextEditorField::new('descriptionAvis'),
        ];
    }
    
}