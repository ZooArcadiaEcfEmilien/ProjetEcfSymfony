<?php

namespace App\Controller\Admin;

use App\Entity\UserTabEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class UserTabEntityCrudController extends AbstractCrudController
{    
    public static function getEntityFqcn(): string
    {
        return UserTabEntity::class;
    }
    public function configureActions(Actions $actions): Actions{

        $actions->add(Crud::PAGE_INDEX, Action::DETAIL);
        return $actions;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            ChoiceField::new('userType')
            ->setChoices([
                'Employé' => 'Employé',
                'Vétérinaire' => 'Vétérinaire',
                'Intérimaire/Stagiaire' => 'Intérimaire/Stagiaire',
                'Admin' => 'Admin',

            ])
            ->setFormType(ChoiceType::class),            
            
            TextField::new('password')
                ->setFormType(PasswordType::class),
            TextField::new('userName'),
            EmailField::new('mail'),
        ];
    }
}
