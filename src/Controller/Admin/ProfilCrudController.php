<?php

namespace App\Controller\Admin;

use App\Entity\Profil;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProfilCrudController extends AbstractCrudController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public static function getEntityFqcn(): string
    {
        return Profil::class;
    }


    public function configureFields(string $pageName, ): iterable
    {

        return [
            FormField::addTab('Général'),

            TextField::new('nom')
                ->setRequired(true)
                ->setColumns("col-sm-6 col-lg-5 col-xxl-3"),

            TextField::new('prenom')
                ->setRequired(true)
                ->setColumns("col-sm-6 col-lg-5 col-xxl-3"),

            AssociationField::new('genre')
                ->setRequired(false)
                ->setColumns("col-sm-6 col-lg-5 col-xxl-3")
                ->setFormTypeOptions(['choice_label' => 'nom',]),

            TextEditorField::new('description')
                ->setRequired(false)
                ->hideOnIndex(),

            NumberField::new('tailleEnCentimetre')
                ->setRequired(false)
                ->hideOnIndex(),

            NumberField::new('localisation')
                ->setRequired(false),

            DateField::new('dateNaissance')
                ->setRequired(true),

            AssociationField::new('metier')
                ->setRequired(true)
                ->hideOnIndex()
                ->setFormTypeOptions(['choice_label' => 'nom', 'multiple' => true]),

            FormField::addTab('Compétences'),

            AssociationField::new('experience')
                ->setRequired(true)
                ->setFormTypeOptions(['choice_label' => 'nom']),

            AssociationField::new('langues')
                ->setRequired(false)
                ->hideOnIndex()
                ->setFormTypeOptions(['choice_label' => 'nom', 'multiple' => true]),

            TextField::new('imageFile')
                ->hideOnIndex()
                ->setFormType(VichImageType::class)
                ->setLabel('Photo de profil'),

            TextField::new('PDFFile')
                ->hideOnIndex()
                ->setFormType(VichFileType::class)
                ->setLabel('CV en PDF'),

            TextField::new('MP3File')
                ->hideOnIndex()
                ->setFormType(VichFileType::class)
                ->setLabel('Extrait de voix'),

            DateField::new('dateInscription'),
        ];
    }
}
