<?php

namespace App\Controller\Admin;

use App\Entity\UserTabEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserTabEntityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return UserTabEntity::class;
    }

    
    public function configureFields(string $pageName): iterable
{
    return [
        TextField::new('userType'),
        TextField::new('password')
            ->setFormType(PasswordType::class)
          /*  ->onlyOnForms()*/,                    // A dé commenter une fois que le mdp sera sécurisé partout et testé / 
        TextField::new('userName'),
        EmailField::new('mail'),
    ];
}
    
}
