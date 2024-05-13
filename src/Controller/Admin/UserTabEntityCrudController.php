<?php

namespace App\Controller\Admin;

use App\Entity\UserTabEntity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;


class UserTabEntityCrudController extends AbstractCrudController
{    
    public static function getEntityFqcn(): string
    {
        return UserTabEntity::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        $actions->add(Crud::PAGE_INDEX, Action::DETAIL)
                ->disable(Action::EDIT);
        return $actions;
    }

    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            ChoiceField::new('roles')
            ->setChoices([
                'Utilisateur' => 'ROLE_USER',
                'Administrateur' => 'ROLE_ADMIN',
                // Ajoutez d'autres rôles si nécessaire
            ])
            ->allowMultipleChoices()
            ->setRequired(true)
            ->setLabel('Rôles'),   
            
            TextField::new('password')
                ->setFormType(PasswordType::class),
            TextField::new('userName'),
            EmailField::new('mail'),
        ];
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if ($entityInstance instanceof UserTabEntity) {
            // Récupérer le mot de passe depuis l'entité
            $plainPassword = $entityInstance->getPassword();

            // Hasher le mot de passe
            $hashedPassword = $this->passwordHasher->hashPassword(
                $entityInstance,
                $plainPassword
            );

            // Définir le mot de passe hashé sur l'entité utilisateur
            $entityInstance->setPassword($hashedPassword);
        }

        // Appeler la méthode parente pour persister l'entité
        parent::persistEntity($entityManager, $entityInstance);
    }

}

    /*public function configureFields(string $pageName): iterable
    {
        return [
            ChoiceField::new('roles')
            ->setChoices([
                'Utilisateur' => 'ROLE_USER',
                'Administrateur' => 'ROLE_ADMIN',
                // Ajoutez d'autres rôles si nécessaire
            ])
            ->allowMultipleChoices()
            ->setRequired(true)
            ->setLabel('Rôles'),   
            
            TextField::new('password')
                ->setFormType(PasswordType::class),
            TextField::new('userName'),
            EmailField::new('mail'),
        ];
    }*/
   /* public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, Security $security, EntityManagerInterface $entityManager): Response
    {
        $user = new UserTabEntity();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();

            // do anything else you need here, like send an email

            return $security->login($user, 'form_login', 'main');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form,
        ]);
    }
    
}*/
