<?php
class User
{
    private ?int $iduser = null;
    private ?string $firstName = null;
    private ?string $lastName = null;
    private ?string $address = null;
    private ?int $phonenumb = null;
    private ?string $email = null;
    private ?string $password = null;

    public function __construct( $firstName, $lastName, $address, $phonenumb, $email, $password)
    {
       
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->phonenumb = $phonenumb;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Get the value of idCustomer
     */
    public function getiduser()
    {
        return $this->iduser;
    }

    /**
     * Get the value of lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

/**
     * Get the value of phonenumb
     */
    public function getPhonenumb()
    {
        return $this->phonenumb;
    }

    /**
     * Set the value of phonenumb
     *
     * @return  self
     */
    public function setPhonenumb($phonenumb)
    {
        $this->phonenumb = $phonenumb;

        return $this;
    }


    // /**
    //  * Get the value of dob
    //  */
    // public function getDob()
    // {
    //     return $this->dob;
    // }

    // /**
    //  * Set the value of dob
    //  *
    //  * @return  self
    //  */
    // public function setDob($dob)
    // {
    //     $this->dob = $dob;

    //     return $this;
    // }

      /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

      /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

}