<?php

namespace MyMovies\DAO;

use MyMovies\Domain\Category;

class CategoryDAO extends DAO
{

    public function findAll() {
        $sql = "select * from category";
        $result = $this->getDb()->fetchAll($sql);
        
        // Convertit les résultats de requête en tableau d'objets du domaine
        $categories = array();
        foreach ($result as $row) {
            $categoryId = $row['cat_id'];
            $categories[$categoryId] = $this->buildDomainObject($row);
        }
        return $categories;
    }


    public function find($id) {
        $sql = "select * from category where cat_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Aucune categorie ne correspond à l'identifiant " . $id);
    }


    protected function buildDomainObject($row) {
        $category = new Category();
        $category->setId($row['cat_id']);
        $category->setName($row['cat_name']);
        return $category;
    }
}