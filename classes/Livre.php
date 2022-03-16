<?php

class Livre
{
    private int $id_livre;
    private string $titre;
    private string $auteur;

    public function __construct(array $datas)
    {
        foreach ($datas as $key => $data) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($data);
            }
        }
    }

    /**
     * Récupère l'id d'un livre
     *
     * @return void
     */
    private function getId_livre()
    {
        return $this->id_livre;
    }

    /**
     * Set le id d'un livre
     *
     * @param [type] $id
     * @return object livre
     */
    private function setId_livre($id)
    {
        $this->id_livre = $id;
        return $this;
    }

    /**
     * Récupère le titre d'un livre
     *
     * @return string
     */
    private function getTitre()
    {
        return $this->titre;
    }

    /**
     * Définit le titre d'un livre
     *
     * @param string $str
     * @return object livre
     */
    private function setTitre($str)
    {
        $this->titre = $str;
        return $this;
    }

    /**
     * Récupère l'auteuur d'un livre
     *
     * @return string
     */
    private function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Définit l'auuteur d'un livre
     *
     * @param string $str
     * @return object livre
     */
    public function setAuteur($str)
    {
        $this->auteur = $str;
        return $this;
    }

}
