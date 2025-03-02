<?php

namespace App\Controller\Admin;

use App\Entity\CategorieActualite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategorieActualiteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CategorieActualite::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            ColorField::new('couleur'),
        ];
    }
}
