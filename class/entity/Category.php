<?php

class Category
{

    // Attributs
    protected $categoryId;
    protected $categoryName;
    protected $categorySlug;
    protected $categoryDescription;
    protected $categorySort;

    // Constructeur
    public function __construct(?string $categoryId, string $categoryName, string $categorySlug, string $categoryDescription, string $categorySort)
    {
        $this->categoryId = $categoryId;
        $this->categoryName = $categoryName;
        $this->categorySlug = $categorySlug;
        $this->categoryDescription = $categoryDescription;
        $this->categorySort = $categorySort;
    }

    /**
     * Get the value of categoryId
     */ 
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Get the value of categoryName
     */ 
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * Set the value of categoryName
     *
     * @return  self
     */ 
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;

        return $this;
    }

    /**
     * Get the value of categorySlug
     */ 
    public function getCategorySlug()
    {
        return $this->categorySlug;
    }

    /**
     * Set the value of categorySlug
     *
     * @return  self
     */ 
    public function setCategorySlug($categorySlug)
    {
        $this->categorySlug = $categorySlug;

        return $this;
    }

    /**
     * Get the value of categoryDescription
     */ 
    public function getCategoryDescription()
    {
        return $this->categoryDescription;
    }

    /**
     * Set the value of categoryDescription
     *
     * @return  self
     */ 
    public function setCategoryDescription($categoryDescription)
    {
        $this->categoryDescription = $categoryDescription;

        return $this;
    }

    /**
     * Get the value of categorySort
     */ 
    public function getCategorySort()
    {
        return $this->categorySort;
    }

    /**
     * Set the value of categorySort
     *
     * @return  self
     */ 
    public function setCategorySort($categorySort)
    {
        $this->categorySort = $categorySort;

        return $this;
    }
}