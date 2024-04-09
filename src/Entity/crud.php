<?php
    namespace App\Entity;

    use Doctrine\ORM\Mapping as ORM;

    abstract class Crud_propriete{
    
    public function getId(): ?int{
        return $this->id;
        
    }

    public function createProperty($propertyName, $propertyValue){
        $setterMethod = 'set' . ucfirst($propertyName);
        if (method_exists($this, $setterMethod)) {
            $this->$setterMethod($propertyValue);
        }
    }

    public function readProperty($propertyName){
        $getterMethod = 'get' . ucfirst($propertyName);
        if (method_exists($this, $getterMethod)) {
            return $this->$getterMethod();
        }
        return null;
    }

    public function updateProperty($propertyName, $propertyValue){
        $setterMethod = 'set' . ucfirst($propertyName);
        if (method_exists($this, $setterMethod)) {
            $this->$setterMethod($propertyValue);
        }
    }

    public function deleteProperty($propertyName){
        $setterMethod = 'set' . ucfirst($propertyName);
        if (method_exists($this, $setterMethod)) {
            $this->$setterMethod(null);
        }
    }
}