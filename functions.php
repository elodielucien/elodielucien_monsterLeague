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


function getMonsters()
{
    return [
        [
            'name' => 'Domovoï',
            'strength' => 30,
            'life' => 300,
            'type' => 'water'
        ],
        [
            'name' => 'Wendigos',
            'strength' => 100,
            'life' => 450,
            'type' => 'earth'
        ],
        [
            'name' => 'Thunderbird',
            'strength' => 400,
            'life' => 500,
            'type' => 'air'
        ],
        [
            'name' => 'Sirrush',
            'strength' => 250,
            'life' => 1500,
            'type' => 'fire'
        ],
    ];
}

function getMonsters2() {   //Au lieu d'un tableau de tableaux, on utilise un tableau d'objets Monster
       
       return [
        new Monster('Domovoï',30,300,'water')
        ,
        new Monster('Wendigos',100,450,'earth')
        ,
        new Monster('Thunderbird',400,500,'air')
        ,
        new Monster('Sirrush',250,1500,'fire')
        
        ];

}

function getMonsters3() { //Cette fois on utilise la base de données crée dans phpMyAdmin pour remplir un tableau de monstres
         
         $myPDO = new PDO('mysql:host=localhost;dbname=monstre', 'root');   //On instancie une bdd grâce au constructeur de la classe PDO
         $result = $myPDO->query("SELECT * FROM monstres"); //On utilise la méthode query() de la classe PDO, qui prend une requête sql en paramètre. 
         $tabMonstres = array() ;

         foreach ($result->fetchAll() as $ligne) { //On parcourt l'ensemble de la table, chaque ligne étant un tableau clée/valeur représentant un monstre
             $m = new Monster($ligne['name'], $ligne['strength'], $ligne['life'], $ligne['type']); //on instancie un monstre avec les infos de la ligne de la bdd (qui est un tableau associatif)
             $tabMonstres[] = $m; //On remplit chaque ligne de $tabMonstres 
                          
         }
         $result -> closeCursor();

         return $tabMonstres;
         

}

/**
 * Our complex fighting algorithm!
 *
 * @return array With keys winning_ship, losing_ship & used_jedi_powers
 */


function fight(Monster $firstMonster, Monster $secondMonster)
{
    $firstMonsterLife = $firstMonster->getLife();
    $secondMonsterLife = $secondMonster->getLife();

    while ($firstMonsterLife > 0 && $secondMonsterLife > 0) {
        $firstMonsterLife = $firstMonsterLife - $secondMonster->getStrength();
        $secondMonsterLife = $secondMonsterLife - $firstMonster->getStrength();
    }

    if ($firstMonsterLife <= 0 && $secondMonsterLife <= 0) {
        $winner = null;
        $looser = null;
    } elseif ($firstMonsterLife <= 0) {
        $winner = $secondMonster;
        $looser = $firstMonster;
    } else {
        $winner = $firstMonster;
        $looser = $secondMonster;
    }

    return array(
        'winner' => $winner,
        'looser' => $looser,
    );
}

function ajouterMonstre() { //fonction qui ajoute un monstre dans la bdd (reliée à phpMyAdmin)

       $myPDO = new PDO('mysql:host=localhost;dbname=monstre', 'root');

       $newName = $_POST['Name']; //On récupère les données du formulaire dans les variables $_POST
       $newStrength = $_POST['Strength'];
       $newLife = $_POST['Life'];
       $newType = $_POST['Type'];

       $newLine = $myPDO->exec("INSERT INTO monstres('name','strength', 'life', 'type') VALUES 
       ([$newName], 
        [$newStrength],
        [$newLife],
        [$newType])");//Nouvelle ligne à insérer dans la bdd. La fonction exec retourne le nombre de ligne affectées par la requête en paramètre
       
        echo "ajout de " + $newLine + "ligne à la base de données.\n"; //On aura un ajout de 1 ligne 

} 

?>