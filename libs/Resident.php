<?php

class Resident extends User {

    private string $status;

    private string $apartmentNumber;

    public function __construct(int $id, string $name, string $phoneNumber, string $email, string $apartmentNumber, string $status) {
        parent::__construct($id, $name, $phoneNumber, $email);
        $this->status = $status;
        $this->apartmentNumber = $apartmentNumber;
    }

    public function getApartmentNumber() : string {
        return $this->apartmentNumber;
    }

    public function getStatus(): string {
        return $status;
    }

    public function jsonSerialize(): array {
        return array_merge(parent::jsonSerialize(), [
            'status' => $this->status,
            'apartmentNumber' => $this->apartmentNumber,
        ]);
    }

    public static function createFromArray(array $residentArray): Resident {

        return new Resident($residentArray['id'], $residentArray['name'], $residentArray['phoneNumber'],
            $residentArray['email'], $residentArray['appartmentNumber'], $residentArray['status']);
    }
}
