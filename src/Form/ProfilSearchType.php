<?php

namespace App\Form;

use App\Entity\Experience;
use App\Entity\Genre;
use App\Entity\Langue;
use App\Entity\Metier;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('metier', EntityType::class, [
                'class' => Metier::class,
                'required' => false,
                'placeholder' => 'Non spécifié',
                'choice_label' => 'nom',
                'attr' => [
                    'class' => 'full-input',
                ],
            ])
            ->add('genre', EntityType::class, [
                'class' => Genre::class,
                'required' => false,
                'placeholder' => 'Non spécifié',
                'choice_label' => 'nom',
                'attr' => [
                    'class' => 'full-input',
                ],
            ])
            ->add('experience', EntityType::class, [
                'class' => Experience::class,
                'required' => false,
                'placeholder' => 'Non spécifié',
                'choice_label' => 'nom',
                'attr' => [
                    'class' => 'full-input',
                ],
            ])
            ->add('langue', EntityType::class, [
                'class' => Langue::class,
                'required' => false,
                'placeholder' => 'Non spécifié',
                'choice_label' => 'nom',
                'attr' => [
                    'class' => 'full-input',
                ],
            ])
            ->add('agemin', NumberType::class, [
                'invalid_message' => 'Saisissez un nombre',
                'required' => false,
                'attr' => [
                    'class' => 'little-input',
                    'placeholder' => 'ex: 30',
                ],
            ])
            ->add('agemax', NumberType::class, [
                'invalid_message' => 'Saisissez un nombre',
                'required' => false,
                'attr' => [
                    'class' => 'little-input',
                    'placeholder' => 'ex: 40',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {

        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
