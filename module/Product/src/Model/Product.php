<?php
namespace Product\Model;

class Product
{
    public $id;
    public $name;
    public $description;
    // public $img;

    public function exchangeArray(array $data)
    {
        $this->id          = $data["id"]?:null;
        $this->name        = $data["name"]?:null;
        $this->description = $data["description"]?:null;
        // $this->img         = $data["img"]?:null;
    }
    public function getArrayCopy()
    {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'description' => $this->description,
            // 'img'         => $this->img,
        ];
    }
}
