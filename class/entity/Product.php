<?php

class Product
{

    // Attributs
    protected $productId;
    protected $productCategoryId;
    protected $productName;
    protected $productSlug;
    protected $productDescription;
    protected $productSeller;
    protected $productPrice;
    protected $productTrash;

    // Constructeur
    public function __construct(?string $productId, string $productCategoryId, string $productName, string $productSlug, string $productDescription, string $productSeller, string $productPrice, string $productTrash = "0")
    {
        $this->productId = $productId;
        $this->productCategoryId = $productCategoryId;
        $this->productName = $productName;
        $this->productSlug = $productSlug;
        $this->productDescription = $productDescription;
        $this->productSeller = $productSeller;
        $this->productPrice = $productPrice;
        $this->productTrash = $productTrash;
    }

    /**
     * Get the value of productId
     */ 
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Get the value of productCategoryId
     */ 
    public function getProductCategoryId()
    {
        return $this->productCategoryId;
    }

    /**
     * Set the value of productCategoryId
     *
     * @return  self
     */ 
    public function setProductCategoryId($productCategoryId)
    {
        $this->productCategoryId = $productCategoryId;

        return $this;
    }

    /**
     * Get the value of productName
     */ 
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Set the value of productName
     *
     * @return  self
     */ 
    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * Get the value of productSlug
     */ 
    public function getProductSlug()
    {
        return $this->productSlug;
    }

    /**
     * Set the value of productSlug
     *
     * @return  self
     */ 
    public function setProductSlug($productSlug)
    {
        $this->productSlug = $productSlug;

        return $this;
    }

    /**
     * Get the value of productDescription
     */ 
    public function getProductDescription()
    {
        return $this->productDescription;
    }

    /**
     * Set the value of productDescription
     *
     * @return  self
     */ 
    public function setProductDescription($productDescription)
    {
        $this->productDescription = $productDescription;

        return $this;
    }

    /**
     * Get the value of productSeller
     */ 
    public function getProductSeller()
    {
        return $this->productSeller;
    }

    /**
     * Set the value of productSeller
     *
     * @return  self
     */ 
    public function setProductSeller($productSeller)
    {
        $this->productSeller = $productSeller;

        return $this;
    }

    /**
     * Get the value of productPrice
     */ 
    public function getProductPrice()
    {
        return $this->productPrice;
    }

    /**
     * Set the value of productPrice
     *
     * @return  self
     */ 
    public function setProductPrice($productPrice)
    {
        $this->productPrice = $productPrice;

        return $this;
    }

    /**
     * Get the value of productTrash
     */ 
    public function getProductTrash()
    {
        return $this->productTrash;
    }

    /**
     * Set the value of productTrash
     *
     * @return  self
     */ 
    public function setProductTrash($productTrash)
    {
        $this->productTrash = $productTrash;

        return $this;
    }
}