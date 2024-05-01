<?php

namespace App\Form;

use App\Entity\AvisEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AvisEntityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreEtoileAvis', IntegerType::class)
            ->add('pseudoAvis', TextType::class)
            ->add('descriptionAvis', TextareaType::class)
            ->add('submit', SubmitType::class, ['label' => 'Ajouter mon avis'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AvisEntity::class,
        ]);
    }
}
