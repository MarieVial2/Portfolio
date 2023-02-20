<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomContact', TextType::class, [
                'attr' => ['placeholder' => "Votre nom"]
            ])
            ->add('prenomContact', TextType::class, [
                'attr' => ['placeholder' => "Votre prénom"]
            ])
            ->add('emailContact', TextType::class, [
                'attr' => ['placeholder' => "Votre e-mail"]
            ])

            ->add('telephoneContact', TextType::class, [
                'attr' => ['placeholder' => "Votre numéro de téléphone"]
            ])
            ->add('contenuContact', TextareaType::class, [
                'attr' => ['placeholder' => "Votre message"]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}