<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use PhpOffice\PhpSpreadsheet\IOFactory;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\ExcelData;

#[AsCommand(
    name: 'app:import-data',
    description: 'Add a short description for your command',
)]
class ImportDataCommand extends Command
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $excelFile =  'C:\Users\Lenovo\AppProject\public\uploads\data.xlsx';
        $spreadsheet = IOFactory::load($excelFile);
        $sheet = $spreadsheet->getActiveSheet();

        $columnMapping = [
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
            'Date évènement (Veh)' => 'dateEvenement',
            'Origine évènement (Veh)' => 'origineEvenement'
        ];

        $validateColumnTitle = [
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

        // var_dump($columnMapping);
        // var_dump($validateColumnTitle);

        $actualColumnTitles = array();

        foreach ($sheet->getColumnIterator() as $col) {
            $actualColumnTitle = $col->getCellIterator()->current()->getValue();
            $actualColumnTitles[] = $actualColumnTitle;
        }
        // var_dump($actualColumnTitles);

        // foreach ($columnMapping as $expectedTitle => $property ){
        //     if (!in_array($expectedTitle, $actualColumnTitles)){
        //         $output->writeln("La colonne '$expectedTitle' n'existe pas dans le fichier.");
        //         return Command::FAILURE;
        //     } 
        //     var_dump($expectedTitle);
  
        // }

        foreach ($actualColumnTitles as $expectedTitle => $property ){
            if (!in_array($property, $validateColumnTitle)){
                var_dump("La colonne '$property' n'est pas un nom valide. Veuillez le corriger dans le fichier."); //Ajouter la liste des titres correctes
                return Command::FAILURE;
            }   
        }
        // var_dump($property);
        
        foreach($sheet->getRowIterator() as $row) {
            // var_dump($row);
        //     // $rowData = $row->getCellIterator()->current()->getValue();
            $cellIterator = $row->getCellIterator();

            // Flag to check if the row has any non-empty cells
            $rowHasData = false;

            // Loop through each cell in the current row
            foreach ($cellIterator as $cell) {
                // Get the value of the cell
                $cellValue = $cell->getValue();

                // Check if the cell has data
                if (!is_null($cellValue) && $cellValue !== '') {
                    $rowHasData = true;
                    break; // Break out of the loop if any cell is not empty
                }
            }

            if ($rowHasData) {
                // if($row->getRowIndex() <> 1){
                    // foreach ($cellIterator as $cell) {
                    //     $cellValue = $cell->getValue(); 
                    //     $entity = new ExcelData();

                        // foreach($columnMapping as $title => $property) {
                        //     $columnIndex = array_search($title, $actualColumnTitles);
                        //     $value = isset($cellValue[$columnIndex]) ? $cellValue[$columnIndex] : null;
                        //     $setter = 'set'.ucfirst($property);
                        //     $entity->$setter($value);
                        // }
                        // var_dump($entity);
                        // $columnTitleToSave = $sheet->getCell($cell->getColumn() . 1)->getValue();
                        // $columnTitleToDB = $columnMapping[$columnTitleToSave];
                        // $setter = 'set'.ucfirst($columnTitleToDB);
                        // if($row->getRowIndex() <> 1){
                        // //To handle date type:
                        //     if(\PhpOffice\PhpSpreadsheet\Shared\Date::isDateTime($cell)){
                        //         $formattedDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($cell->getValue())->format('d/m/Y');                    
                        //         // $formattedDate =  $formattedDate = \DateTime::createFromFormat('Ymd',$cell->getValue());
                        //         $cellValue = $formattedDate;                   
                        //     }else{
                        //         $cellValue = $cell->getValue(); 
                        //     } 
                            // var_dump($cellValue); 
                            // $columnTitleToSave = $sheet->getCell($cell->getColumn() . 1)->getValue();
                            // $columnTitleToDB = $columnMapping[$columnTitleToSave];
                            // $setter = 'set'.ucfirst($columnTitleToDB);
                            // var_dump($columnTitleToSave);
                            // var_dump($columnTitleToDB);
                            // $entity->$setter($cellValue);
                        }
                    // }
                // }
                
            // } else {
            //     $row->getRowIndex();
            // }
            // var_dump($rowHasData);
            // $entity = new ExcelData(); 
            // foreach($columnMapping as $title => $property) {
            //     $columnIndex = array_search($title, $actualColumnTitles);
            //     $value = isset($rowData[$columnIndex]) ? $rowData[$columnIndex] : null;
            //     $setter = 'set'.ucfirst($property);
            //     $entity->$setter($value);
            //     // var_dump($entity);

        }
        
            // // var_dump($entity);
            // $this->entityManager->persist($entity); 
        // }

        // $this->entityManager->flush();
        $output->writeln('Les données sont importées avec succès');

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
