<?php
class dashboardModel extends CI_Model
{
    /* -------------------------------------------------------------------------- */
    /*                             THỐNG KÊ NGƯỜI DÙNG                            */
    // đếm tất cả các tài khoản khách hàng
    public function Count_account()
    {
        $role = array(0, 1);
        $this->db->select('account.*');
        $this->db->from('account');
        $this->db->where_in('account.role', $role);
        return $this->db->count_all_results();
    }

    // đếm gói dịch vụ khách hàng chưa duyệt
    public function Count_register_new()
    {
        $this->db->select('register_packages.*');
        $this->db->from('register_packages');
        $this->db->where('status', 1);
        return $this->db->count_all_results();
    }

    // đếm gói dịch vụ đang hoạt động
    public function Count_register_online()
    {
        $status_online = array(2, 3);
        $this->db->select('register_packages.*');
        $this->db->from('register_packages');
        $this->db->where_in('status', $status_online);
        return $this->db->count_all_results();
    }

    public function select_register_expired()
    {
        $sql = $this->db->select('account.fullname as tenTK, packages.name as tenGOI, register_packages.*')
            ->from('account')
            ->join('register_packages', 'register_packages.account_id = account.id')
            ->join('packages', 'packages.id = register_packages.package_id')
            ->where('register_packages.status', 3)
            ->get();
        return $sql->result();
    }
    /* -------------------------------------------------------------------------- */

    /* -------------------------------------------------------------------------- */
    /*                           PHẦN THỐNG KÊ                           */
    // chưa duyệt
    public function Count_product()
    {
        $this->db->select('product_cars.*');
        $this->db->from('product_cars');
        $this->db->where('product_status', 0);
        return $this->db->count_all_results();
    }

    public function Count_all_product()
    {
        $status = array(1, 2);
        $this->db->select('product_cars.*');
        $this->db->from('product_cars');
        $this->db->where_in('product_status', $status);
        return $this->db->count_all_results();
    }

    public function Count_all_sale_status_none()
    {
        $this->db->select('new_car_sales.*');
        $this->db->from('new_car_sales');
        $this->db->where('status', 0);
        return $this->db->count_all_results();
    }

    public function Count_all_sale_checked()
    {
        $status = array(1, 3);
        $this->db->select('new_car_sales.*');
        $this->db->from('new_car_sales');
        $this->db->where_in('status', $status);
        return $this->db->count_all_results();
    }

    public function Count_all_new()
    {
        $this->db->select('news.*');
        $this->db->from('news');
        return $this->db->count_all_results();
    }

    /* -------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------- */
    /*                              THỐNG KÊ LIÊN HỆ                              */
    public function Count_all_contact_new()
    {
        $this->db->select('contacts.*');
        $this->db->from('contacts');
        $this->db->where('status', 0);
        $this->db->where('account_id', 1);
        return $this->db->count_all_results();
    }

    public function Count_all_contact_checked()
    {
        $this->db->select('contacts.*');
        $this->db->from('contacts');
        $this->db->where('status', 1);
        $this->db->where('account_id', 1);
        return $this->db->count_all_results();
    }

    public function Select_contact()
    {
        $sql = $this->db->select('account.fullname as tenTK, contacts.*')
            ->from('account')
            ->join('contacts', 'account.id = contacts.account_id')
            ->where('contacts.account_id', 1)
            ->get();
        return $sql->result();
    }

    public function getID($id)
    {
        $sql = $this->db->select('account.fullname as tenTK, contacts.*')
            ->from('account')
            ->join('contacts', 'account.id = contacts.account_id')
            ->where('contacts.id', $id)
            ->get();
        return $sql->row();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('contacts', $data);
    }
    /* -------------------------------------------------------------------------- */
}
