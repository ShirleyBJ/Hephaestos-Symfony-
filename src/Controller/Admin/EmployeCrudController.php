<?php

namespace App\Controller\Admin;

use App\Entity\Employe;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EmployeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Employe::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('civilite','Civilite'),
            TextField::new('nom','Nom'),
            TextField::new('prenom','Prénom'),
            TextField::new('adresse','Adresse'),
            TextField::new('cp','CP'),
            TextField::new('ville','Ville'),
            TextField::new('telephone','Télèphone'),
            EmailField::new('email','Email'),
            TextField::new('motDePasse','Mot de Passe'),
            TextField::new('role'),
            DateField::new('dateNaissance'),
            TextField::new('fonction'),
            DateField::new('dateEmbauche'),
            DateField::new('dateFinContrat'),
        ];
    }
    
}
