<?php

namespace CatalogueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($id = null)
    {
       $listeProducts = $this->getEm()->getRepository('CatalogueBundle:Produit')->getListeProductById($id);
      
//        if (null === $listeProducts) {
//            throw new NotHttpFoundException("Not Found");
//        }
        return $this->render('CatalogueBundle:Default:index.html.twig', array(
            'categories' => $this->getCategries(),
            'products' => $listeProducts,
        ));
    }
    
    public function displayAction($id){
       
        $fiche = $this->getEm()->getRepository('CatalogueBundle:Produit')->find($id);
        
        return $this->render('CatalogueBundle:Default:ficheproduct.html.twig', array(
            'fiche' => $fiche,
            'categories' => $this->getCategries(),
        ));
    }
    
    /**
     * 
     * @return la liste des catégories
     */
    public function getCategries(){
        return $this->getEm()->getRepository('CatalogueBundle:Categorie')->findAll();
    }
    
    /**
     * On recupère l'entity manager
     * @return $em
     */
    public function getEm(){
        return $this->getDoctrine()->getManager();
    }
    
    
}
