<?php
class OrderModel extends BaseModel
{
    const TABLE1 = 'orders';
    const TABLE2 = "orders_item";

    public function getAll($facility_id = "")
    {
        if ($facility_id != "") {
            $sql = "SELECT o.* from orders o inner join users u on o.user_id = u.id where u.facility_id = $facility_id";
        } else {
            return $this->all(self::TABLE1);
        }
        return $this->query_all($sql);
    }

    public function getAllDetail($user_id)
    {
        $sql = "SELECT n.title, n.description, n.price, n.image, n.address, n.category_id, oi.id as order_item_id, oi.new_id, oi.order_id, oi.status, oi.created_at as order_created_at from news n inner join orders_item oi on n.id = oi.new_id inner join orders o on oi.order_id = o.id where o.user_id = $user_id";
        return $this->query_all($sql);
    }

    public function getOne($id)
    {
        return $this->one(self::TABLE1, $id);
    }
    public function createOrder($data)
    {
        return $this->create(self::TABLE1, $data);
    }
    public function createOrderItem($data)
    {
        return $this->create(self::TABLE2, $data);
    }
    public function updateOrderItem($data, $id)
    {
        return $this->update(self::TABLE2, $data, $id);
    }
    public function deleteOrder($id)
    {
        return $this->delete(self::TABLE2, $id);
    }
    public function updateStatus($id)
    {
        $sql = "update orders_item set status = 2 where id = $id";
        return $this->execute($sql);
    }
}