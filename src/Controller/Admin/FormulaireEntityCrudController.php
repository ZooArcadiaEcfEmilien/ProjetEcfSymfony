<?php

namespace App\Controller\Admin;

use App\Entity\FormulaireEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;

class FormulaireEntityCrudController extends AbstractCrudController
{
    public function configureActions(Actions $actions): Actions{

        $actions->add(Crud::PAGE_INDEX, Action::DETAIL)
                ->disable(Action::NEW,Action::DELETE, Action::EDIT);

        return $actions;
    }
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
            EmailField::new('adresseMailFormulaire', 'Adresse mail'),
            TextField::new('sujetFormulaire', 'Sujet'),
            TextEditorField::new('descriptionFormulaire', 'Votre demande'),

        ];
    }
    
}
