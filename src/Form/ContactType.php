<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => ['class' => 'w-full p-2 border bg-white'],
                'label_attr' => ['class' => 'font-semibold text-gray-700'],
            ])
            ->add('email', EmailType::class, [
                'attr' => ['class' => 'w-full p-2 border bg-white'],
                'label_attr' => ['class' => 'font-semibold text-gray-700'],
            ])
            ->add('objet', TextType::class, [
                'attr' => ['class' => 'w-full p-2 border bg-white'],
                'label_attr' => ['class' => 'font-semibold text-gray-700'],
            ])
            ->add('message', TextareaType::class, [
                'attr' => ['class' => 'w-full p-2 border bg-white h-32'],
                'label_attr' => ['class' => 'font-semibold text-gray-700'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
