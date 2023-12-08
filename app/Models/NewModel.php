<?php
class NewModel extends BaseModel
{
    const TABLE = 'news';
    public function getAll($categoryId = "", $user_id = "", $facilities = [], $all = false)
    {
        if ($categoryId == "") {
            if ($user_id == "") {
                if (count($facilities)) {
                    $sql = "SELECT n.*, u.fullname, u.image as avatar, f.name as facility_name from news n inner join users u on n.user_id = u.id inner join facilities f on n.facility_id = f.id where f.id = $facilities[0] and n.id != $facilities[1] and n.status != 0 limit 0,5";
                } else {
                    if ($all) {
                        $sql = "SELECT n.*, u.fullname, u.image as avatar, f.name as facility_name from news n inner join users u on n.user_id = u.id inner join facilities f on n.facility_id = f.id ";
                    } else {
                        $sql = "SELECT n.*, u.fullname, u.image as avatar, f.name as facility_name from news n inner join users u on n.user_id = u.id inner join facilities f on n.facility_id = f.id where n.status != 0 order by n.id";
                    }
                }
            } else {
                $sql = "SELECT n.* from news n inner join users u on n.user_id = u.id WHERE u.id = {$user_id}";
            }
        } else {
            $sql = "SELECT n.*,c.name as category_name ,u.fullname,u.image as avatar from news n inner join categories c on n.category_id = c.id inner join users u on n.user_id = u.id WHERE n.category_id = ${categoryId} and n.status != 0 ORDER BY id asc limit 0,5";
        }
        return $data = $this->query_all($sql);
    }

    public function getAllByFacility($facility_id)
    {
        $sql = "SELECT * from news where facility_id = {$facility_id}";
        return $this->query_all($sql);
    }

    public function getOne($id)
    {
        $sql = "SELECT n.*, u.fullname, u.phone, u.image as avatar from news n inner join users u on n.user_id = u.id where n.id = $id";
        return $data = $this->query_one($sql);
    }

    public function getLatest($cate_id = "")
    {
        if ($cate_id == "") {
            $sql = "SELECT n.*, u.fullname, u.image as avatar, f.name as facility_name from news n inner join users u on n.user_id = u.id inner join facilities f on n.facility_id = f.id where n.status != 0 order by n.created_at desc";
        } else {
            $sql = "SELECT n.*, u.fullname, u.image as avatar, f.name as facility_name from news n inner join users u on n.user_id = u.id inner join facilities f on n.facility_id = f.id where n.status != 0 and n.category_id = ${cate_id} order by n.created_at desc";
        }
        return $data = $this->query_all($sql);
    }

    public function getTopView($cate_id = "", $limit = "")
    {
        if ($cate_id == "") {
            $sql = "SELECT n.*, u.fullname, u.image as avatar, f.name as facility_name from news n inner join users u on n.user_id = u.id inner join facilities f on n.facility_id = f.id where n.status != 0 order by n.view desc";
        } else {
            $sql = "SELECT n.*, u.fullname, u.image as avatar, f.name as facility_name from news n inner join users u on n.user_id = u.id inner join facilities f on n.facility_id = f.id where n.status != 0 and n.category_id = ${cate_id} order by n.view desc";
        }

        if ($limit != "") {
            $sql .= " limit $limit";
        }
        return $data = $this->query_all($sql);
    }


    public function createNew($data)
    {
        return $this->create(self::TABLE, $data);
    }
    public function updateNew($data, $id)
    {
        return $this->update(self::TABLE, $data, $id);
    }
    public function deleteNew($id)
    {
        return $this->delete(self::TABLE, $id);
    }
    public function deleteNewAdmin($id)
    {
        return $this->delete(self::TABLE, $id);
    }
    public function getNewPost()
    {
        $sql = "SELECT * from news where `status` != 0 ORDER BY created_at desc limit 0,5";
        return $data = $this->query_all($sql);
    }
    public function getPrice($from = "", $to = "")
    {
        $sql = "SELECT n.*,c.name as category_name ,u.fullname,u.image as avatar from news n inner join categories c on n.category_id = c.id inner join users u on n.user_id = u.id WHERE n.`status` != 0 and n.price BETWEEN $from AND $to";
        return $data = $this->query_all($sql);
    }
    public function getArea($from = "", $to = "")
    {
        $sql = "SELECT n.*,c.name as category_name ,u.fullname,u.image as avatar from news n inner join categories c on n.category_id = c.id inner join users u on n.user_id = u.id WHERE n.`status` != 0 and n.area BETWEEN ${from} AND ${to}";

        return $data = $this->query_all($sql);
    }
    public function getFacilities($id)
    {
        $sql = "SELECT n.*,u.fullname,u.image as avatar from news n inner join users u on n.user_id = u.id inner join facilities f on n.facility_id = f.id where n.`status` != 0 and f.id = ${id}";
        return $data = $this->query_all($sql);
    }
    public function updateIsrent($id)
    {
        $sql = " update news  set is_rent = 1 
        where id = $id ";
        return $this->execute($sql);
    }
}