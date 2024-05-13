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
use Symfony\Component\Validator\Constraints\Length;

use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;



class UserTabEntityCrudController extends AbstractCrudController
{   
    public function index(AdminContext $context)
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('admin');
        }
        // Continuer avec l'affichage de la page normalement
        return parent::index($context);
    }
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
    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setFormOptions([
            'validation_groups' => ['Default', 'create'],
        ]);
    }
    public function configureFields(string $pageName): iterable
    {
        $roleChoices = [
            'Utilisateur' => 'ROLE_USER',
            'Administrateur' => 'ROLE_ADMIN',
            'Employe' => 'ROLE_EMPLOYE',
            'Veterinaire' => 'ROLE_VETERINAIRE'
        ];

        return [

            ChoiceField::new('roles')
                
                ->setChoices($roleChoices)
                ->allowMultipleChoices()
                ->setRequired(true)
                ->setLabel('Rôles'),
            
            TextField::new('password')
                ->setFormType(PasswordType::class)
                ->setFormTypeOptions([
                    'constraints' => [
                        new Length(['min' => 4, 'minMessage' => 'Le mot de passe doit contenir au moins {{ limit }} caractères.'])
                    ],
                ]),
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
