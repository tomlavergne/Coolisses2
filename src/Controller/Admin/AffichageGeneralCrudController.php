<?php

namespace App\Controller\Admin;

use App\Entity\AffichageGeneral;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class AffichageGeneralCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AffichageGeneral::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('artistesEnVitrine')->setRequired(true)
                ->setFormTypeOptions([
                    'choice_label' => function ($artiste) {
                        // Construire le libellé en utilisant le nom et le prénom (ou toute autre propriété pertinente)
                        return $artiste->getPrenom() . ' ' . $artiste->getNom();
                    }
                ]),
            AssociationField::new('actualiteDialogBox')->setRequired(true)
                ->setFormTypeOptions([
                    'choice_label' => 'titre'
                ]),
            ];
    }

}
