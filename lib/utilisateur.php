<?php
class Utilisateur
{
    private $_id;
    private $_nom;

    // Constructeurs
    public function __construct()
    {
        $this->_id = 1;
        $this->_nom = "Fabrice";
    }

    // Getters
    public function getId() { return $this->_id; }
    public function getNom() { return $this->_nom; }

    // Setters
    public function setId($id) { $this->_id = (int) $id; }
    public function setNom($nom)
    {
        if (is_string($nom) && (strlen($nom) <= 10))
        {
            $this->_nom = $nom;
        }
    }

    // Methodes
}

?>


