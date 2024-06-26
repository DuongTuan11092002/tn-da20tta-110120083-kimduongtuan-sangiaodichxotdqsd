<?php
class dashboardModel extends CI_Model
{
    public function getPackageByAccount($id)
    {
        $statusArray = [1, 2];

        $sql = $this->db->select('account.fullname as tenTK, register_packages.*, packages.name as tenGOI')
            ->from('account')
            ->join('register_packages', 'register_packages.account_id = account.id')
            ->join('packages', 'packages.id = register_packages.package_id')
            ->where('register_packages.account_id', $id)
            ->where_in('register_packages.status', $statusArray)
            ->order_by('register_packages.created_at', 'desc') // sắp xếp theo created_at giảm dần
            ->limit(1)
            ->get();

        return $sql->row();
    }

    public function ChangeRegisterPackage($id, $data)
    {
        $this->db->where('account_id', $id);
        return $this->db->update('register_packages', $data);
    }

    public function ChangeToStatusAccount($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('account', $data);
    }

    // Điếm sô lượng sản phẩm  theo doanh nghiệp
    public function countAllToProductByBusiness($id)
    {
        $this->db->where('account_id', $id);
        $this->db->from('product_cars');

        return $this->db->count_all_results();
    }

    // Thống kê số lượng liên hệ
    public function countAllToContactStatusCheck($id)
    {
        $this->db->where('status', 0);
        $this->db->where('account_id', $id);
        $this->db->from('contacts');
        return $this->db->count_all_results();
    }

    public function countAllToContactStatusChecked($id)
    {
        $this->db->where('status', 1);
        $this->db->where('account_id', $id);
        $this->db->from('contacts');
        return $this->db->count_all_results();
    }

    public function selectContactToBusiness($id)
    {
        $sql = $this->db->select('account.fullname as tenTK, contacts.*, product_cars.product_name as tenSP')
            ->from('account')
            ->join('contacts', 'account.id = contacts.account_id')
            ->join('product_cars', 'product_cars.product_id = contacts.product_id')
            ->where('contacts.account_id', $id)
            ->order_by('contacts.id', 'desc')
            ->get();
        return $sql->result();
    }

    public function DetailContact($id)
    {
        $sql = $this->db->select('account.fullname as tenTK, contacts.*, product_cars.product_name as tenSP')
            ->from('account')
            ->join('contacts', 'account.id = contacts.account_id')
            ->join('product_cars', 'product_cars.product_id = contacts.product_id')
            ->where('contacts.id', $id)
            ->get();
        return $sql->row();
    }

    public function UpdateContact($id, $data) 
    {
        $this->db->where('id', $id);
        return $this->db->update('contacts', $data);
    }
}
