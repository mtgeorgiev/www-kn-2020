<?php

/**
 * Cachier is a user that works with the building budget
 */
class Cachier extends User {

    // list of home numbers served
    private array $apartmentServed;

    public function __construct(array $apartmentServed) {
        $this->apartmentServed = $apartmentServed;
    }

    public function getListOfServedApartments(): array {
        return $this->apartmentServed;
    }

}
