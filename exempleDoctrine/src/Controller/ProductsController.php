<?php

namespace App\Controller;

use App\Entity\Products;
use App\Form\ProductsType;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/products")
 */
class ProductsController extends AbstractController
{
    /**
     * @Route("/", name="products_index", methods={"GET"})
     * @param ProductsRepository $productsRepository
     * @return Response
     */
    public function index(ProductsRepository $productsRepository): Response
    {
        return $this->render('products/index.html.twig', [
            'products' => $productsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="products_new", methods={"GET", "POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $product = new Products();
        $form = $this->createForm(ProductsType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //récupération de la saisie sur l'upload
            $pictureFile = $form['picture2']->getData();
            if ($pictureFile) {
                //renommage du fichier
                //nom du fichier + extension
                $newPicture = uniqid() . '.' . $pictureFile->guessExtension();
                //assignation de la valeur à la propriété picture à l'aide du setter
                $product->setPicture($newPicture);
                try {
                    //déplacement du fichier vers le répertoire de destination sur le serveur
                    $pictureFile->move(
                        $this->getParameter('photo_directory'),
                        $newPicture
                    );
                } catch (FileException $e) {
                    //gestion de l'erreur si le déplacement n'est pas effectué
                }
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($product);
            $entityManager->flush();
            $this->addFlash(
                'success',
                'Produit ajouté avec succès !'
            );

            return $this->redirectToRoute('products_index');
        }

        return $this->render('products/new.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="products_show", methods={"GET"})
     * @param Products $product
     * @return Response
     */
    public function show(Products $product): Response
    {
        return $this->render('products/show.html.twig', [
            'product' => $product,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="products_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Products $product
     * @return Response
     */
    public function edit(Request $request, Products $product): Response
    {
        $form = $this->createForm(ProductsType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //récupération de la saisie sur l'upload
            $pictureFile = $form['picture2']->getData();
            if ($pictureFile) {
                //renommage du fichier
                //nom du fichier + extension
                $newPicture = uniqid() . '.' . $pictureFile->guessExtension(); //uniqid() permet de créer un id parfaitement unique à la microsecondes près
                //assignation de la valeur à la propriété picture à l'aide du setter
                $product->setPicture($newPicture);
                try {
                    //déplacement du fichier vers le répertoire de destination sur le serveur
                    $pictureFile->move(
                        $this->getParameter('photo_directory'),
                        $newPicture
                    );
                } catch (FileException $e) {
                    //gestion de l'erreur si le déplacement n'est pas effectué
                }
            }

            $this->getDoctrine()->getManager()->flush();
            $this->addFlash(
                'success',
                'Produit modifié avec succès !'
            );


            return $this->redirectToRoute('products_index');
        }

        return $this->render('products/edit.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="products_delete", methods={"DELETE"})
     * @param Request $request
     * @param Products $product
     * @return Response
     */
    public function delete(Request $request, Products $product): Response
    {
        if ($this->isCsrfTokenValid('delete'.$product->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($product);
            $entityManager->flush();
            $this->addFlash(
                'success',
                'Produit supprimé avec succès !'
            );

        }

        return $this->redirectToRoute('products_index');
    }
}
