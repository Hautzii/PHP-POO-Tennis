<?php
class Matchh {
    private string $score;
    private string $formatted_date;

    public function __construct(
        private readonly PlayerInterface $player1,
        private readonly PlayerInterface $player2,
    ){
        $this->score = $this->generateRandomScore();
        $this->formatted_date = $this->getDate();
    }
    public function getDate(): string {
        $date = new DateTime();
        $this->formatted_date = $date->format('d/m/Y');
        return $this->formatted_date;
    }
    private function generateRandomScore(): string {
        $scorePlayer1 = rand(0, 10);
        $scorePlayer2 = rand(0, 10);
        return "$scorePlayer1-$scorePlayer2";
    }
    public function getWinner(): string {
        $scores = explode("-", $this->score);
        $scorePlayer1 = (int)trim($scores[0]);
        $scorePlayer2 = (int)trim($scores[1]);
        if ($scorePlayer1 > $scorePlayer2) {
            return "The winner is " .$this->player1->getFullName() ." with a score of " .$scorePlayer1 ." : " .$scorePlayer2. " - " .$this->getDate();
        } elseif ($scorePlayer2 > $scorePlayer1) {
            return "The winner is " .$this->player2->getFullName()." with a score of " .$scorePlayer1 ." : " .$scorePlayer2. " - " .$this->getDate();
        } else {
            return "It's a draw";
        }
    }
}