<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory as io;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\ExcelData;
use App\Form\ImportFileType;

class ImportDataController extends AbstractController
{
    // private $entityManager;
    // public $excelFile = '';          
    // public $spreadsheet = io::load('data.xlsx');
    // public $spreadsheet = PhpOffice\PhpSpreadsheet\IOFactory::load('data.xlsx');
    // public $sheet = $spreadsheet->getActiveSheet();

    public $columnMapping = [
        'Compte Affaire' => 'compteAffaire',
        'Compte évènement (Veh)' => 'compteEvenement',
        'Compte dernier évènement (Veh)' => 'compteDernierEvenement',
        'Numéro de fiche' => 'numeroFiche',
        'Libellé civilité' => 'LibelleCivilite',
        'Propriétaire actuel du véhicule' => 'proprietaireActuel',
        'Nom' => 'nom',
        'Prénom' => 'prenom',
        'N° et Nom de la voie' => 'numEtNomDeVoie',
        'Complément adresse 1' => 'complementAdresse',
        'Code postal' => 'codePostal',
        'Ville' => 'ville',
        'Téléphone domicile' => 'telephoneDomicile',
        'Téléphone portable' => 'telephonePortable',
        'Téléphone job' => 'telephoneJob',
        'Email' => 'email',
        'Date de mise en circulation' => 'dateDeMiseEnCirculation',
        'Date achat (date de livraison)' => 'dateAchat',
        'Date dernier évènement (Veh)' => 'dateDernierEvenement',
        'Libellé marque (Mrq)' => 'marque',
        'Libellé modèle (Mod)' => 'modele',
        'Version' => 'version',
        'VIN' => 'VIN',
        'Immatriculation' => 'immatriculation',
        'Type de prospect' => 'typeDeProspect',
        'Kilométrage' => 'kilometrage',
        'Libellé énergie (Energ)' => 'energie',
        'Vendeur VN' => 'vendeurVN',
        'Vendeur VO' => 'vendeurVO',
        'Commentaire de facturation (Veh)' => 'commentaireDeFacturation',
        'Type VN VO' => 'type',
        'Numéro de dossier VN VO' => 'numeroDossier',
        'Intermediaire de vente VN' => 'intermediaireDeVente',
        'Date évènement (Veh)' => 'DateEvenement',
        'Origine évènement (Veh)' => 'origineEvenement'
    ];
    
    public $validateColumnTitle = [
        'Compte Affaire',
        'Compte évènement (Veh)',
        'Compte dernier évènement (Veh)',
        'Numéro de fiche',
        'Libellé civilité',
        'Propriétaire actuel du véhicule',
        'Nom',
        'Prénom',
        'N° et Nom de la voie',
        'Complément adresse 1',
        'Code postal',
        'Ville',
        'Téléphone domicile',
        'Téléphone portable',
        'Téléphone job',
        'Email',
        'Date de mise en circulation',
        'Date achat (date de livraison)',
        'Date dernier évènement (Veh)',
        'Libellé marque (Mrq)',
        'Libellé modèle (Mod)',
        'Version',
        'VIN',
        'Immatriculation',
        'Type de prospect',
        'Kilométrage',
        'Libellé énergie (Energ)',
        'Vendeur VN',
        'Vendeur VO',
        'Commentaire de facturation (Veh)',
        'Type VN VO',
        'Numéro de dossier VN VO',
        'Intermediaire de vente VN',
        'Date évènement (Veh)',
        'Origine évènement (Veh)'
    ];
    
    public $actualColumnTitles = array();


    // public function __construct(EntityManagerInterface $entityManager)
    // {
    //     $this->entityManager = $entityManager;
    //     // $this->excelFile = $excelFile;
    // }

    #[Route('/import/data', name: 'app_import_data')]
    public function index(): Response
    {
        $form = $this->createForm(ImportFileType::class);
        return $this->render('import_data/index.html.twig');
    }
}
