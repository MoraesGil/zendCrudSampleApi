<?php
namespace Product\Controller;

use Product\Form\ProductForm;
use Product\InputFilter\FormProductFilter;
use Product\Model\ProductTable;
use Product\Model\Product;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class ProductController extends AbstractRestfulController {
    private $table;

    public function __construct(ProductTable $table) {
        $this->table = $table;
    }

    public function getList() {
        $products = $this->table->fetchAll();
        $data = $productArr = [];
        foreach($products as $product) {
            $data[] = $product;
        }
        if(empty($data)){
            $response['status'] ='success';
            $response['message'] = 'Products not found';
            $response['products'] = [];
            return new JsonModel($response);
        }
        $response['status'] ='success';
        $response['message'] = 'Products are available';
        $response['products'] = $data;
        return new JsonModel($response);
    }

    public function get($id) {
        $id = (int) $id;
        if (0 === $id) {
            $response['status'] ='error';
            $response['message'] = 'Product does not exists';
            return new JsonModel($response);
        }
        $product = $this->table->getProduct($id);
        $response = $productArr = [];
        if($product){
            $productArr = json_decode(json_encode($product), true);
        } else {
            $response['status'] ='error';
            $response['message'] = 'Product does not exists';
            $response['productDetails'] = [];
            return new JsonModel($response);
        }
        $response['status'] ='success';
        $response['message'] = 'Product details are available';
        $response['productDetails'] = $productArr;
        return new JsonModel($response);
    }

    public function create($data) {
        $form = new ProductForm();
        $request = $this->getRequest();
        $inputfilter = new FormProductFilter();
        $form->setInputFilter($inputfilter);
        $form->setData($request->getPost());
        $response=[];
        if ($form->isValid()) {
            $product = new Product();
            $product->exchangeArray($form->getData());
            $this->table->saveProduct($product);
            $response['status'] ='success';
            $response['message'] = 'Product added successfully!';
            return new JsonModel($response);
        }
        $response['status'] ='error';
        $response['message'] = 'invalid data';
        return new JsonModel($response);
    }

    public function update($id, $data) {
        $id = (int) $id;
        $response=[];
        if (0 === $id) {
            $response['status'] ='error';
            $response['message'] = 'Product does not exists';
            return new JsonModel($response);
        }
        $form = new ProductForm();
        $inputfilter = new FormProductFilter();
        $form->setInputFilter($inputfilter);
        $data['id'] = $id;
        $form->setData($data);
        if ($form->isValid()) {
            $product = new Product();
            $product->exchangeArray($form->getData());
            try{
                $this->table->saveProduct($product);
                $response['status'] ='success';
                $response['message'] = 'Product updated successfully!';
                return new JsonModel($response);
            } catch (\Exception $e) {
                $response['status'] ='error';
                $response['message'] = 'Product does not exists';
                return new JsonModel($response);
            }
        }
        $response['status'] ='error';
        $response['message'] = 'invalid data';
        return new JsonModel($response);
    }

    public function delete($id) {
        $id = (int) $id;
        $response=[];
        if (0 === $id) {
            $response['status'] ='error';
            $response['message'] = 'Product does not exists';
            return new JsonModel($response);
        }
        $product = $this->table->getProduct($id);
        if($product){
            $this->table->deleteProduct($id);
            $response['status'] ='success';
            $response['message'] = 'Product deleted successfully!';
            return new JsonModel($response);
        }
        $response['status'] ='error';
        $response['message'] = 'Product does not exists';
        return new JsonModel($response);
    }
}
