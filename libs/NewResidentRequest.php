<?php

/**
 * Request for creation of new Resident object
 */
class NewResidentRequest {

    private string $email;
    
    private string $password;
    
    private string $name;

    private string $phoneNumber;

    private string $status;

    private string $appartmentNumber;

    /**
     * Constructs a request object from associative array
     * 
     * @param $residentData user input with register resident data
     */
    public function __construct(array $residentData) {

        $this->email = isset($residentData['email']) ? $residentData['email'] : null;
        $this->password = isset($residentData['password']) ? $residentData['password'] : null;
        $this->name = isset($residentData['name']) ? $residentData['name']: null;
        $this->phoneNumber = isset($residentData['phoneNumber']) ? $residentData['phoneNumber'] : null;
        $this->status = isset($residentData['status']) ? $residentData['status'] : null;
        $this->appartmentNumber = isset($residentData['appartmentNumber']) ? $residentData['appartmentNumber'] : null;
    }

    /**
     * Validates the request object
     * 
     * @throws Exception when the request object is not valid
     */
    public function validate(): void {

        $errors = [];

        $this->validateNonEmpty('name', $errors);
        $this->validateNonEmpty('email', $errors);
        $this->validateNonEmpty('password', $errors);
        $this->validateNonEmpty('phoneNumber', $errors);
        $this->validateNonEmpty('status', $errors);
        $this->validateNonEmpty('appartmentNumber', $errors);

        if (filter_var($this->email, FILTER_VALIDATE_EMAIL) == false) {
            $errors['email'] = "Invalid email!";
        }

        // if (preg_match("/^[а-яА-Я ]*$/", $this->name) == false) {
        //     $errors['name'] = "Invalid user name";
        // }

        if ($this->status != "owner" && $this->status != "tenant") {
           $errors['status'] = "Invalid status";
        }

        if ($errors) {
            throw new RequestValidationException($errors);
        }
    }

    private function validateNonEmpty($fieldName, &$errors) {

        if (!$this->$fieldName) {
            $errors[$fieldName] = 'Field should not be empty';
        }

    }


    /**
     * Exports the request object to associative array.
     * Can be used for serialization
     */
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
