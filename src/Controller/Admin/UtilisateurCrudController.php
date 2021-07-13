<?php

namespace App\Controller\Admin;

use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UtilisateurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Utilisateur::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('civilite','Civilité'),
            TextField::new('nom','Nom'),
            TextField::new('prenom','Prénom'),
            TextField::new('adresse','Adresse'),
            TextField::new('cp','CP'),
            TextField::new('ville','Ville'),
            TextField::new('telephone','Télèphone'),
            EmailField::new('email','Email'),
            TextField::new('role','Rôle'),
            TextField::new('motDePasse','Mot de Passe'),
        ];
    }
}
