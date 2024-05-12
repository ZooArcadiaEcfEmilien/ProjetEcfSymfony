<?php

namespace App\Controller\Admin;

use App\Entity\AvisEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;



class AvisEntityCrudController extends AbstractCrudController
{
    public function configureActions(Actions $actions): Actions{

        $actions->add(Crud::PAGE_INDEX, Action::DETAIL)
                ->disable(Action::DELETE);

        return $actions;
    }
    public static function getEntityFqcn(): string
    {
        return AvisEntity::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            BooleanField::new('validationAvis', 'Valider l\'avis ?'),
            IntegerField::new('nombreEtoileAvis', 'Nombre d\'étoile'),
            TextField::new('pseudoAvis','Pseudo'),
            TextEditorField::new('descriptionAvis','Description'),
        ];
    }
    
}
