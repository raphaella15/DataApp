<?php

namespace App\Form;

use App\Entity\ExcelData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExcelDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('compteAffaire')
            ->add('compteEvenement')
            ->add('compteDernierEvenement')
            ->add('numeroFiche')
            ->add('libelleCivilite')
            ->add('proprietaireActuel')
            ->add('nom')
            ->add('prenom')
            ->add('numEtNomDeVoie')
            ->add('complementAdresse')
            ->add('codePostal')
            ->add('ville')
            ->add('telephoneDomicile')
            ->add('telephonePortable')
            ->add('telephoneJob')
            ->add('email')
            ->add('dateDeMiseEnCirculation')
            ->add('dateAchat')
            ->add('dateDernierEvenement')
            ->add('marque')
            ->add('modele')
            ->add('version')
            ->add('VIN')
            ->add('immatriculation')
            ->add('typeDeProspect')
            ->add('kilometrage')
            ->add('energie')
            ->add('vendeurVN')
            ->add('vendeurVO')
            ->add('commentaireDeFacturation')
            ->add('type')
            ->add('numeroDossier')
            ->add('intermediaireDeVente')
            ->add('dateEvenement')
            ->add('origineEvenement')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExcelData::class,
        ]);
    }
}
