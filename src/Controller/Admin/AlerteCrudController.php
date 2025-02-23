<?php

namespace App\Controller\Admin;

use App\Entity\Alerte;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AlerteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Alerte::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Message d\'alerte')
            ->setPageTitle('new', 'Message d\'alerte')
            ->setPageTitle('edit', 'Message d\'alerte')
            ->setPageTitle('detail', 'Message d\'alerte');
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextEditorField::new('message'),
            TextField::new('lien'),
            ColorField::new('couleur')
        ];
    }

}
