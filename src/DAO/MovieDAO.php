<?php

namespace MyMovies\DAO;

use MyMovies\Domain\Movie;

class MovieDAO extends DAO
{
      /**
     * @var \MyMovies\DAO\CategoryDAO
     */

    private $categoryDAO;

    public function setCategoryDAO(CategoryDAO $categoryDAO) {
        $this->categoryDAO = $categoryDAO;
    }


    public function findAll() {
        $sql = "select * from movie";
        $result = $this->getDb()->fetchAll($sql);
        

        $medicaments = array();
        foreach ($result as $row) {
            $movieId = $row['mov_id'];
            $movies[$movieId] = $this->buildDomainObject($row);
        }
        return $movies;
    }


    public function findAllByFamille($categoryId) {
        $sql = "select * from movie where cat_id=?";
        $result = $this->getDb()->fetchAll($sql, array($categoryId));
        
        // Convertit les résultats de requête en tableau d'objets du domaine
        $movies = array();
        foreach ($result as $row) {
            $movieId = $row['mov_id'];
            $movies[$movieId] = $this->buildDomainObject($row);
        }
        return $medicaments;
    }


    public function find($id) {
        $sql = "select * from movie where mov_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("Aucun film ne correspond à l'identifiant " . $id);
    }


    protected function buildDomainObject($row) {
        $movie = new Movie();
        $movie->setId($row['mov_id']);
        $movie->setTitle($row['mov_title']);
        $movie->setDescriptionShort($row['mov_description_short']);
        $movie->setDescriptionLong($row['mov_description_long']);
        $moviet->setDirector($row['mov_director']);
        $movie->setYear($row['mov_year']);
        $movie->setImage($row['mov_image']);

        if (array_key_exists('cat_id', $row)) {

            $categoryId = $row['cat_id'];
            $category = $this->categoryDAO->find($categoryId);
            $movie->setCategory($category);
        }
   
        return $movie;
    }
}