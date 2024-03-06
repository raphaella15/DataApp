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

use App\Service\data;
use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Format;

use function PHPSTORM_META\type;

#[AsCommand(
    name: 'app:data-import',
    description: 'Add a short description for your command',
)]
class DataImportCommand extends Command
{
    protected static $defaultName = 'app:data-import';
    private $entityManager;
    // public data = ;

    public function __construct(EntityManagerInterface $entityManager, )
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
        $excelFile =  'C:\Users\Lenovo\AppProject\public\uploads\data2.xlsx';
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
            'Date évènement (Veh)' => 'DateEvenement',
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

        $actualColumnTitles = array();

        foreach ($sheet->getColumnIterator() as $col) {
            $actualColumnTitle = $col->getCellIterator()->current()->getValue();
            $actualColumnTitles[] = $actualColumnTitle;
        }

        foreach ($actualColumnTitles as $expectedTitle => $property ){
            if (!in_array($property, $validateColumnTitle)){
                var_dump("La colonne '$property' n'est pas un nom valide. Veuillez le corriger dans le fichier."); //Ajouter la liste des titres correctes
                return Command::FAILURE;
            }   
        }

        foreach($sheet->getRowIterator() as $row) {
            // Get the cell iterator for the current row
            $cellIterator = $row->getCellIterator();

            $entity = new ExcelData();
            // var_dump($entity);

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
             // If the row has data, process it
            if ($rowHasData) {
                //If row index <> 1 save in database
                if($row->getRowIndex() <> 1){
                    echo "Row number: " . $row->getRowIndex() . "\n"; 
                    //==> Save to database 
                    foreach ($cellIterator as $cell) {  
                        //$cellStyle = $cell->getStyle();
                        echo "Col number: " . $cell->getColumn() . "\n";
                        //To handle date type:
                        
                        if(\PhpOffice\PhpSpreadsheet\Shared\Date::isDateTime($cell)){
                           
                            $formattedDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($cell->getValue())->format('d/m/Y');
                            $dateObject = DateTime::createFromFormat('d/m/Y', $formattedDate);
                            $dateObject->format('d/m/Y');
                            $cellValue = $dateObject;
                                              
                        }else{
                            $cellValue = $cell->getValue();
                        }  
                        var_dump($cellValue);
                       
                        
                        
                    /*********************/
                        var_dump($cellValue);
                        $columnTitleToSave = $sheet->getCell($cell->getColumn() . 1)->getValue();
                        $columnTitleToDB = $columnMapping[$columnTitleToSave];
    
                        //To Use for setter                 
                        $setter = 'set'.ucfirst($columnTitleToDB);
                        $entity->$setter($cellValue);        
    
                        $this->entityManager->persist($entity);

                    } 
                    $this->entityManager->flush(); 
                                            
                //var_dump($row);
                } else {
                    echo "Nothing Row number: " . $row->getRowIndex() . "\n";
                    //break; // Break out of the loop if a row is empty
                }
            }
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}