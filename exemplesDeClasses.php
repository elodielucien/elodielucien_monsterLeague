<?php
class Monster {
     private $name; //attribut de la classe, pas besoin de type en php : cette variable pourra prendre n'importe quel type donné ultérieusement 
     private $strength;
     private $life = 0; //valeur par défaut, si aucun age n'est précisé
     private $type;


     function __construct($n, $s, $l, $t) { // ATTENTION : double tiret du bas 
     	
        $this->name = $n; //$this sera remplacé par $monster1 ou $monster2. 
        $this->strength = $s;
        $this->life = $l;
        $this->type = $t;

    }

     public function getName() {
	       echo $this->name;
    }

    public function getStrength() {
	       echo $this->strength;
    }
    
    public function getLife() {
	       echo $this->life;
    }

    public function getType() {
	       echo $this->type;
    }

    public function setName($n) {
    	$this->name = $n;
    }
    
    public function setStrength($s) {
    	$this->strength = $s;
    }

    public function setLife($l) {
    	$this->life = $l;
    }

    public function setType($t) {
    	$this->type = $t;
    }




}

$monster1 = new Monster(); 
$monster1->setName('Bodoi'); 


$monster2 = new Monster(); //Ici le type est rose
$monster2->setLife(23);
$monster2->setType('blue'); //Ici le type devient bleue

$monster1->setLife(6);



var_dump($monster1,$monster2); //Donne un aperçu de ce que l'on obtient (est affiché dans le navigateur)
?>