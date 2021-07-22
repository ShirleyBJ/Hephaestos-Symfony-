<?php

namespace App\Controller\Admin;

use App\Entity\ProduitCommander;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProduitCommanderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProduitCommander::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('quantite'),
            AssociationField::new('commande'),
            AssociationField::new('produit'),
        ];
    }
    
}
