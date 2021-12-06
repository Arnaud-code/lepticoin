<?php

class User {

    // Attributs
    protected $userId;
    protected $userName;
    protected $userSurname;
    protected $userAlias;
    protected $userMail;
    protected $userPassword;
    protected $userRole;

    // Constructeur
    public function __construct(?string $userId, string $userName, string $userSurname, string $userAlias, string $userMail, string $userPassword, string $userRole) {
        $this->userId = $userId;
        $this->userName = $userName;
        $this->userSurname = $userSurname;
        $this->userAlias = $userAlias;
        $this->userMail = $userMail;
        $userPassword = password_hash($userPassword, PASSWORD_BCRYPT);
        $this->userPassword = $userPassword;
        $this->userRole = $userRole;
    }

    /**
     * Get the value of userId
     */
    public function getUserId() {
        return $this->userId;
    }

    /**
     * Get the value of userName
     */
    public function getUserName() {
        return $this->userName;
    }

    /**
     * Set the value of userName
     *
     * @return  self
     */
    public function setUserName($userName) {
        $this->userName = $userName;
        return $this;
    }

    /**
     * Get the value of userSurname
     */
    public function getUserSurname() {
        return $this->userSurname;
    }

    /**
     * Set the value of userSurname
     *
     * @return  self
     */
    public function setUserSurname($userSurname) {
        $this->userSurname = $userSurname;
        return $this;
    }

    /**
     * Get the value of userAlias
     */ 
    public function getUserAlias()
    {
        return $this->userAlias;
    }

    /**
     * Set the value of userAlias
     *
     * @return  self
     */ 
    public function setUserAlias($userAlias)
    {
        $this->userAlias = $userAlias;

        return $this;
    }

    /**
     * Get the value of userMail
     */
    public function getUserMail() {
        return $this->userMail;
    }

    /**
     * Set the value of userMail
     *
     * @return  self
     */
    public function setUserMail($userMail) {
        $this->userMail = $userMail;
        return $this;
    }

    /**
     * Get the value of userPassword
     */
    public function getUserPassword() {
        return $this->userPassword;
    }

    /**
     * Set the value of userPassword
     *
     * @return  self
     */
    public function setUserPassword($userPassword) {
        $this->userPassword = $userPassword;
        return $this;
    }

    /**
     * Get the value of userRole
     */ 
    public function getUserRole()
    {
        return $this->userRole;
    }

    /**
     * Set the value of userRole
     *
     * @return  self
     */ 
    public function setUserRole($userRole)
    {
        $this->userRole = $userRole;

        return $this;
    }
}
