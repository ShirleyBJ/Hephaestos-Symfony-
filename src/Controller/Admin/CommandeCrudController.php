<?php

namespace App\Controller\Admin;

use App\Entity\Commande;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CommandeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Commande::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('client','ID Client'),
            AssociationField::new('employe','ID Employe'),
            DateField::new('dateCommande','Date Commande'),
            DateField::new('dateRetraitCommande', 'Date Retrait Commande'),
            AssociationField::new('produitCommanders','Produit Commandé'),
            MoneyField::new('prixUnitaire')->setCurrency('EUR'),
            MoneyField::new('prixTotalCommande')->setCurrency('EUR'),
            MoneyField::new('prixTotalProduit')->setCurrency('EUR'),
        ];
    }
    
}
