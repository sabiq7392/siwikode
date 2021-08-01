<?php
class Crud_model extends CI_Model
{
    public function getAll($table)
    {
        return $this->db->get($table)->result();
    }

    public function findById($table, $id)
    {
        return $this->db->get_where($table, ['id' => $id])->row();
    }
    public function findByEmail($table, $email) {
        return $this->db->get_where($table, ['email' => $email])->row();
    }

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function delete($table, $id)
    {
        $this->db->delete($table, ['id' => $id]);
    }

    public function update($table, $id, $data)
    {
        $this->db->update($table, $data, ['id' => $id]);
    }

    public function __processLogin__($table, $email) {
        return $this->db->get_where($table, ['email' => $email])->row_array();
    }
    
    public function __jenisWisata__() {
        return $this->db->get('jenis_wisata')->result();
    }

    public function __kategori__() {
        return $this->db->get('kategori')->result();
    }

    public function joinTable($select, $from, $arr_join) {
        // $select = 'testimoni_wisata.*, profesi.nama_profesi, wisata_depok.nama_wisata'; (string)
        // $from = 'testimoni_wisata'; (string)
        // arr_join = [['profesi','profesi.id = testimoni_wisata.profesi_id', 'left'],['wisata_depok','wisata_depok.id = testimoni_wisata.wisata_depok_id']] (array)
        // arr_join[i][0] => required
        // ----//-----[1] => required
        // ----//-----[2] => optional, default inner
        $this->db->select($select);
        $this->db->from($from);
        foreach ($arr_join as $join){
            if (count($join) == 2) {
                $join[2] = 'inner';
            }
            $this->db->join($join[0],$join[1],$join[2]);
        }

        return $this->db->get()->result();
    }
}
