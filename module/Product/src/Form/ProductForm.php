<?php
namespace Product\Form;
use Zend\Form\Form;
class ProductForm extends Form {
  public function __construct($name = null) {
    // We will ignore the name provided to the constructor
    parent::__construct('product');
    $this->add([
      'name' => 'id',
      'type' => 'hidden',
    ]);
    $this->add([
      'name' => 'name',
      'type' => 'text',
      'options' => [
        'label' => 'Product Name',
      ],
    ]);
    $this->add([
      'name' => 'description',
      'type' => 'text',
      'options' => [
        'label' => 'Product description',
      ],
    ]);

    // $this->add([
    //   'type'  => 'file',
    //   'name' => 'img',
    //   'attributes' => [
    //     'id' => 'file'
    //   ],
    //   'options' => [
    //     'label' => 'Image file',
    //   ],
    // ]);
  }
}
