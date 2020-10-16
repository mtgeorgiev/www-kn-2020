<?php

abstract class User implements JsonSerializable {
    
    private int $id;

    private string $name;

    private string $phoneNumber;

    public function __construct(int $id, string $name, string $phoneNumber) {
        $this->id = $id;
        $this->name = $name;
        $this->phoneNumber = $phoneNumber;
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

    public function jsonSerialize() {

        $fieldsToSerialize = ['id', 'name', 'phoneNumber'];

        $jsonArray = [];

        foreach ($fieldsToSerialize as $fieldName) {
            $jsonArray[$fieldName] = $this->$fieldName;
        }

        return $jsonArray;
    }

}
