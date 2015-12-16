<?php


namespace MyMovies\Domain;


class Movie

{


    private $id;

    private title;

    private $descriptionShort;
    

    private $descriptionLong;
    


    private $director;


    private $year;

    private $image;
    
    private $categorie


    public function getId() {

        return $this->id;

    }


    public function setId($id) {

        $this->id = $id;

    }
    
        public function getTitle() {
        $this->title;
    }
    
    public function setTitle($title) {
        $this->title = $title;
    }
        


    public function getDescriptionShort() {

        return $this->descriptionShort;

    }


    public function setDescriptionShort($descriptionShort) {

        $this->ldescriptionShort = $descriptionShort;

    }
    
        public function getDirector() {

        return $this->director;

    }


    public function setDirector($director) {

        $this->director = $director;

    }
    
            public function getYear() {

        return $this->year;

    }


    public function setYear($year) {

       return $this->year = $year;

    }
    
    public function getImage() {
        $this->image;
    }
    
    public function setImage($image) {
        $this->image = $image;
    }
        
     public function getCategorie() {

        return $this->categorie;

    }


    public function setCategorie($categorie) {

        $this->categorie = $categorie;

    }



}