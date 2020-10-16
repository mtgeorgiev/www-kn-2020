<?php

class Apartment {

    private string $number;

    private int $floor;

    public function __construct(string $number, int $floor) {
        $this->number = $number;
        $this->floor = $floor;
    }

}