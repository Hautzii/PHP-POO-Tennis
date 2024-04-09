<?php

include 'Player.php';
include 'Matchh.php';
include 'Tournament.php';


$player1 = new Player('Arthur', 'Morvan');
$player2 = new Player('Mathieu', 'Rosiere');
$match = new Matchh($player1, $player2);
Tournament::addPlayer($player1);
Tournament::addPlayer($player2);

function main(): void {
    do {
        echo (
            "1. Add a player\n".
            "2. Get players\n".
            "3. Modify player\n".
            "4. Delete player\n".
            "5. Create match\n".
            "6. Get matches\n".
            "0. Quit\n"
        );
        $input = readline("Choose an option: ");
        switch ($input) {
            case "1":
                $player = new Player(readline("Enter a first name: "), readline("Enter a last name: "));
                Tournament::addPlayer($player);
                break;
            case "2":
                $playerNames = Tournament::getPlayers();
                echo implode("\n", $playerNames) .PHP_EOL;
                break;
            case "3":
                $playerNames = Tournament::getPlayers();
                echo implode("\n", $playerNames) .PHP_EOL;
                $index = (int)readline("Choose a player: ")-1;
                $player = new Player(readline("Enter a first name: "), readline("Enter a last name: "));
                Tournament::modifyPlayer($index, $player);
                break;
            case "4":
                Tournament::getPlayers();
                $index = (int)readline("Choose a player: ");
                Tournament::deletePlayer($index);
                break;
            case "5":
                $playerNames = Tournament::getPlayers();
                echo implode("\n", $playerNames) .PHP_EOL;
                $index1 = (int)readline("Choose a player: ")-1;
                $index2 = (int)readline("Choose a player: ")-1;
                $player1 = Tournament::getPlayer($index1);
                $player2 = Tournament::getPlayer($index2);
                Tournament::createMatch($player1, $player2);
                break;
            case "6":
                Tournament::getMatches();
                break;
            case "0":
                echo "Goodbye !";
                break;
            default:
                echo "Incorrect choice";
                break;
        }
    } while ($input !== "0");
}

main();