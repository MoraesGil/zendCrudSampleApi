<?php
namespace Product\Model;
use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;
class ProductTable
{
    private $tableGateway;
    public function __construct(TableGatewayInterface $tableGateway) {
        $this->tableGateway = $tableGateway;
    }
    public function fetchAll() {
        return $this->tableGateway->select();
    }
    public function getProduct($id) {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        return $row;
    }
    public function saveProduct(Product $product) {
        $data = [
          'id'          => $product->id,
          'name'        => $product->name,
          'description' => $product->description,
          // 'img'         => $product->img,
        ];
        $id = (int) $product->id;
        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }
        if (! $this->getProduct($id)) {
            throw new RuntimeException(sprintf(
                'Cannot update product with identifier %d; does not exist',
                $id
            ));
        }
        $this->tableGateway->update($data, ['id' => $id]);
    }
    public function deleteProduct($id) {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}
