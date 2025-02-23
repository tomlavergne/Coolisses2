<?php

namespace App\Controller\Admin;

use App\Entity\ArticleLocation;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ArticleLocationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ArticleLocation::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Article de location')
            ->setPageTitle('new', 'Article de location')
            ->setPageTitle('edit', 'Article de location')
            ->setPageTitle('detail', 'Article de location');
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            NumberField::new('tarifJour')
                ->setLabel('Tarif pour une journée'),
            NumberField::new('tarif25Jours')
                ->setLabel('Tarif de deux à cinq jours'),
            NumberField::new('tarifPlus6Jours')
                ->setLabel('Tarif pour plus de six jours'),
            NumberField::new('caution'),
        ];
    }

}
