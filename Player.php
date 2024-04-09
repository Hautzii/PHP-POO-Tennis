<?php

interface PlayerInterface {
    public function getFirstName(): string;
    public function getLastName(): string;
    public function getFullName(): string;
    public function getRanking(): int;
    public function setFirstName(): void;
    public function setLastName(): void;
}

class Player implements PlayerInterface {
    public function __construct(private string $firstName, private string $lastName, private int $ranking = 1) {}

    public function getFirstName(): string {
        return $this->firstName;
    }

    public function getLastName(): string {
        return $this->lastName;
    }

    public function getFullName(): string {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getRanking(): int {
        return $this->ranking;
    }

    public function setFirstName(): void {
        $newFirstName = readline("Enter a new first name: ");
        $this->firstName = $newFirstName;
    }

    public function setLastName(): void {
        $newLastName = readline("Enter a new last name: ");
        $this->lastName = $newLastName;
    }
}