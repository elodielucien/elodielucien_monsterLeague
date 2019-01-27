<?php

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