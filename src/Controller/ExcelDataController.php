<?php

namespace App\Controller;

use App\Entity\ExcelData;
use App\Form\ExcelDataType;
use App\Repository\ExcelDataRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/excel/data')]
class ExcelDataController extends AbstractController
{
    #[Route('/', name: 'app_excel_data_index', methods: ['GET'])]
    public function index(ExcelDataRepository $excelDataRepository): Response
    {
        return $this->render('excel_data/index.html.twig', [
            'excel_datas' => $excelDataRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_excel_data_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $excelDatum = new ExcelData();
        $form = $this->createForm(ExcelDataType::class, $excelDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($excelDatum);
            $entityManager->flush();

            return $this->redirectToRoute('app_excel_data_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('excel_data/new.html.twig', [
            'excel_datum' => $excelDatum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_excel_data_show', methods: ['GET'])]
    public function show(ExcelData $excelDatum): Response
    {
        return $this->render('excel_data/show.html.twig', [
            'excel_datum' => $excelDatum,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_excel_data_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ExcelData $excelDatum, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ExcelDataType::class, $excelDatum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_excel_data_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('excel_data/edit.html.twig', [
            'excel_datum' => $excelDatum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_excel_data_delete', methods: ['POST'])]
    public function delete(Request $request, ExcelData $excelDatum, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$excelDatum->getId(), $request->request->get('_token'))) {
            $entityManager->remove($excelDatum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_excel_data_index', [], Response::HTTP_SEE_OTHER);
    }
}
