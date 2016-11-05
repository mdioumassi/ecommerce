<?php

namespace CatalogueBundle\Repository;

/**
 * ProduitRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProduitRepository extends \Doctrine\ORM\EntityRepository
{
    public function getListeProductById($id){
        $req = $this->createQueryBuilder('p')
               ->select('p')
               ->join('p.categories', 'pc')
               //->join('pc.categorie', 'c')
               ->where('pc.id = :id')
               ->setParameter('id', $id);
        
        return $req->getQuery()->getResult();
    }
}
