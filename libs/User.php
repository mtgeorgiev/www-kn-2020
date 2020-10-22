<?php

abstract class User implements JsonSerializable {
    
    private int $id;

    private string $email;

    private string $password;

    private string $name;

    private string $phoneNumber;

    public function __construct(int $id, string $name, string $phoneNumber, string $email) {
        $this->id = $id;
        $this->name = $name;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPhoneNumber(): string {
        return $this->phoneNumber;
    }

    public function jsonSerialize(): array {

        $fieldsToSerialize = ['id', 'name', 'phoneNumber', 'email'];

        $jsonArray = [];

        foreach ($fieldsToSerialize as $fieldName) {
            $jsonArray[$fieldName] = $this->$fieldName;
        }

        return $jsonArray;
    }

}
