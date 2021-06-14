<?php 

class Offres
{ 
    private string $titre;
    private string $descriptif;
    private array $metier;
    private int $id_user;
    private int $id_user_eleve;
    private int $id_metier;

    public function __construct(array $data)
    { 
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    { 
        foreach($data as $key => $value)
        { 
            $method = 'set'. ucfirst($key);

            if(method_exists($this, $method))
            { 
                $this->$method($value);
            }
        }
    }
    
    public function getTitle()
    { 
        return $this->title;
    }

    public function setTitle($title)
    { 
        $this->title = $title;
    }

    public function getDescriptif()
    {
        return $this->descriptif;
    }

    public function setDescriptif($descriptif)
    {
        $this->descriptif = $descriptif;
    }

    public function getMetier()
    {
         return $this->metier;
    }

    public function setMetier($metier)
    { 
        $this->metier = $metier;
    }

    /* Functions id_user !!!! 
    Il faudrait intégrer une logique pour savoir automatiquement quels getters/setters utilisé ?... */ 




    //GETTERS & SETTERS 


}