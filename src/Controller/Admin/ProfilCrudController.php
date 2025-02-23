<?php

namespace App\Controller\Admin;

use App\Entity\Genre;
use App\Entity\Metier;
use App\Entity\Profil;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
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
            TextField::new('nom')->setRequired(true),
            TextField::new('prenom')->setRequired(true),
            NumberField::new('tailleEnCentimetre')->setRequired(true),
            NumberField::new('localisation')->setRequired(true),
            DateField::new('dateNaissance')->setRequired(true),
            AssociationField::new('metier')->setRequired(true)
                ->setFormTypeOptions([
                    'choice_label' => 'nom',
                    'multiple' => true,
                ]),
            AssociationField::new('genre')->setRequired(true)
                ->setFormTypeOptions([
                    'choice_label' => 'nom',
                ]),
            AssociationField::new('experience')->setRequired(true)
                ->setFormTypeOptions([
                    'choice_label' => 'nom',
                ]),
            AssociationField::new('langues')->setRequired(true)
                ->setFormTypeOptions([
                    'choice_label' => 'nom',
                    'multiple' => true,
                ]),
            TextField::new('imageFile')
                ->setFormType(VichImageType::class)
                ->setLabel('Photo de profil'),
            TextField::new('PDFFile')
                ->setFormType(VichFileType::class)
                ->setLabel('CV en PDF'),
            TextField::new('MP3File')
                ->setFormType(VichFileType::class)
                ->setLabel('Extrait de voix'),
            DateField::new('dateInscription'),
        ];
    }

}
