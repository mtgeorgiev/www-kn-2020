<?php

class NewResidentRequest {

    private string $email;
    
    private string $password;
    
    private string $name;

    private string $phoneNumber;

    private string $status;

    private string $appartmentNumber;

    public function __construct(array $residentData) {

        $this->email = isset($residentData['email']) ? $residentData['email'] : null;
        $this->password = isset($residentData['password']) ? $residentData['password'] : null;
        $this->name = isset($residentData['name']) ? $residentData['name']: null;
        $this->phoneNumber = isset($residentData['phoneNumber']) ? $residentData['phoneNumber'] : null;
        $this->status = isset($residentData['status']) ? $residentData['status'] : null;
        $this->appartmentNumber = isset($residentData['appartmentNumber']) ? $residentData['appartmentNumber'] : null;
    }

    public function validate(): void {
        // throw new Exception("Невалидна заявка");
    }

    public function toArray(): array {
        return [
            'email' => $this->email,
            'password' => $this->password,
            'name' => $this->name,
            'phoneNumber' => $this->phoneNumber,
            'status' => $this->status,
            'appartmentNumber' => $this->appartmentNumber,
        ];
    }

}