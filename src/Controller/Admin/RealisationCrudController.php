<?php

namespace App\Controller\Admin;

use App\Entity\Realisation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class RealisationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Realisation::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre'),
            TextField::new('auteur'),
            TextEditorField::new('description'),
            TextField::new('imageFile')
                ->setFormType(VichImageType::class)
                ->setLabel("Photo d'affiche"),
            TextField::new('lienVideo'),
            DateField::new('date'),
            NumberField::new('duree'),
            AssociationField::new('categorie')
                ->setRequired(true)
                ->setFormTypeOptions([
                    'choice_label' => 'nom',
                ]),
        ];
    }

}
