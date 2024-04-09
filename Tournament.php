<?php

class Tournament
{
    private static array $players = [];
    private static array $matches = [];

    public static function addPlayer(PlayerInterface $player): void
    {
        self::$players[] = $player;
    }

    public static function getPlayers(): array
    {
        $playerNames = [];
        foreach (self::$players as $key=>$player) {
            $playerNames[] = ($key+1). " - " .$player->getFullName();
        }
        return $playerNames;
    }

    public static function getPlayer(int $index): PlayerInterface
    {
        return self::$players[$index];
    }

//    public static function getPlayerName(int $index): string
//    {
//        $player = self::$players[$index];
//        return $player->getName();
//    }

    public static function modifyPlayer(int $index, PlayerInterface $player): void
    {
        if (isset(self::$players[$index])) {
            self::getPlayers();
            self::$players[$index] = $player;
        } else {
            echo("The index does not exist.");
        }
    }

    public static function deletePlayer(int $index): string
    {
        if (isset(self::$players[$index])) {
            unset(self::$players[$index]);
            return print "Player $index has been deleted successfully";
        } else {
            return print "The player doesn't exist";
        }
    }

    public static function createMatch(PlayerInterface $player1, PlayerInterface $player2): void {
    $match = new Matchh($player1, $player2);
    echo $match->getWinner() .PHP_EOL;
    self::$matches[] = $match;
    }

    public static function getMatches(): void {
        print_r(self::$matches);
    }
}