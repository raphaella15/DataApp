<?php

namespace App\Controller;

use App\Entity\File as EntityFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\ImportFileType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityFile $importFile = null, Request $request, EntityManagerInterface $manager ): Response
    {
        $importFile = new EntityFile();
        $form = $this->createForm(ImportFileType::class, $importFile);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('filetype')->getData();
            $this->uploadFile($file, $importFile);

            $manager->persist($importFile);
            $manager->flush();

            $this->redirectToRoute('app_data');
        }
        return $this->render('home/index.html.twig', [
            'form' => $form-> createView(),
        ]);
    }

    public function uploadFile(File $file, object $object) {
        $filename = bin2hex(random_bytes(6)) . '.' . $file->guessExtension();
        $file->move($this->getParameter('uploads'), $filename);
        $object->setFileType($filename);
    }
}
