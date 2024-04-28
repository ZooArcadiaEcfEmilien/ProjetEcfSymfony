<?php

namespace App\Controller\Admin;

use App\Entity\FormulaireEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FormulaireEntityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FormulaireEntity::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nomFormulaire', 'Nom'),
            TextField::new('prenomFormulaire', 'Prénom'),
            TextField::new('adresseMailFormulaire', 'Adresse mail'),
            TextField::new('sujetFormulaire', 'Sujet'),
            TextEditorField::new('descriptionFormulaire', 'Votre demande'),

        ];
    }
    
}
