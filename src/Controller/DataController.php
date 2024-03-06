<?php

namespace App\Controller;

use App\Command\DataImportCommand;
use App\Entity\File;
use App\Repository\ExcelDataRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class DataController extends AbstractController
{
    #[Route('/data', name: 'app_data')]
    public function index(ExcelDataRepository $data, DataImportCommand $dataImportCommand): Response
    {
        // $dataImportCommand = new DataImportCommand(File $file);
        return $this->render('data/index.html.twig', [
            // 'data' => $data->findAll(),
        ]);
    }
}
