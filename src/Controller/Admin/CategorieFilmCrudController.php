<?php

namespace App\Controller\Admin;

use App\Entity\CategorieFilm;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategorieFilmCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CategorieFilm::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Catégorie de film')
            ->setPageTitle('new', 'Catégorie de film')
            ->setPageTitle('edit', 'Catégorie de film')
            ->setPageTitle('detail', 'Catégorie de film');
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('nom'),
            ColorField::new('couleur'),
        ];
    }

}
