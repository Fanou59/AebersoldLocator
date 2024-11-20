<?php

namespace App\Controller;

use App\Entity\Morceaux;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api', name: 'api_')]
class AebersoldLocatorController extends AbstractController
{
    #[Route('/tracks', name: 'app_aebersold_locator', methods: ['GET'])]
    public function index(EntityManagerInterface $em): JsonResponse
    {
        $products = $em->getRepository(Morceaux::class)->findAll();
        $data = [];

        foreach ($products as $product) {
            $data[] = [
                'id' => $product->getId(),
                'title' => $product->getTitle(),
                'key' => $product->getKeyChord()->getKeyChord(),
                'style' => $product->getStyle()->getType(),
                'tempo' => $product->getTempo()->getSpeed()
            ];
        }

        return $this->json($data);
    }

    // #[Route('/tracks/{id}', name: 'app_aebersold_locator_show', methods: ['GET'])]
    // public function show(Morceaux $product): JsonResponse
    // {
    //     return $this->json([
    //         'id' => $product->getId(),
    //         'title' => $product->getTitle(),
    //         'key' => $product->getKeyChord()->getKeyChord(),
    //         'style' => $product->getStyle()->getType()
    //     ]);
    // }

    #[Route('/tracks/search', name: 'app_aebersold_locator_search', methods: ['GET'])]
    public function search(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $title = $request->query->get('title');
        if (!$title) {
            return $this->json(['error' => 'Title parameter is missing'], JsonResponse::HTTP_BAD_REQUEST);
        }

        $products = $em->getRepository(Morceaux::class)->createQueryBuilder('m')
            ->where('m.title LIKE :title')
            ->setParameter('title', $title . '%')
            ->getQuery()
            ->getResult();

        $data = [];

        foreach ($products as $product) {
            $data[] = [
                'id' => $product->getId(),
                'title' => $product->getTitle(),
                'key' => $product->getKeyChord()->getKeyChord(),
                'style' => $product->getStyle()->getType(),
                'tempo' => $product->getTempo()->getSpeed(),
                'album' => $product->getVolume()->getNumber(),
                'chorus' => $product->getChorus()->getNumber(),
                'disc' => $product->getDisc()->getNumber(),
                'track' => $product->getTrack()->getNumber()
            ];
        }

        return $this->json($data);
    }
}
