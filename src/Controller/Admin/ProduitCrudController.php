<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom','Nom du produit'),
            MoneyField::new('prixUnitaire','Prix Unitaire')->setCurrency('EUR'),
            IntegerField::new('uniteStock','Unités en stock'),
            AssociationField::new('categorieProduit','Catégorie Produit'),
            AssociationField::new('fournisseur','Fournisseur'),
            TextField::new('imgProduit','ImageProduit'),
        ];
    }

}
