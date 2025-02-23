<?php

namespace App\Controller\Admin;

use App\Entity\BruitDeCoolisses;
use EasyCorp\Bundle\EasyAdminBundle\Config\KeyValueStore;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Validator\Constraints\File;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class BruitDeCoolissesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BruitDeCoolisses::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Bruits de Coolisses')
            ->setPageTitle('new', 'Bruits de Coolisses')
            ->setPageTitle('edit', 'Bruits de Coolisses')
            ->setPageTitle('detail', 'Bruits de Coolisses');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre'),
            DateField::new('date'),
            TextField::new('imageFile')
                ->setFormType(VichImageType::class)
                ->setLabel('Image'),
            TextField::new('PDFFile')
                ->setFormType(VichFileType::class)
                ->setLabel('PDF'),
        ];
    }

}
