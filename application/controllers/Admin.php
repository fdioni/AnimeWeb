<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->helper('url_helper');
        $this->load->database();
        $this->load->library('Datatables');
        $this->load->library('Custom_upload');
        $this->load->library('table');
        $this->load->helper('Datatables');
        $this->load->helper('form');
    }

    function table_gen(){
        $tmpl = array('table_open' => '<table id="anime_full" class="table table-hover table-responsive table-bordered display" style="width: 100%">');
        $this->table->set_template($tmpl);

        $this->table->set_heading('ID', 'Judul', 'Deskripsi singkat', '1080p', '720p', '480p');
    }

    public function index()
    {
        //$data['anime'] = $this->admin_model->get_anime();
         $this->table_gen();
        $this->load->view('admin/index');
    }

    public function loadtable()
    {
        $this->datatables
            ->select('id, title, desc_pendek, r_1080, r_720, r_480')
            ->unset_column('r_1080')
            ->unset_column('r_720')
            ->unset_column('r_480')
            ->add_column('r_1080', cek('$1'),'r_1080')
            ->add_column('r_720', cek('$1'),'r_720')
            ->add_column('r_480', cek('$1'),'r_480')
            ->from('anm_main');
        echo $this->datatables->generate();
    }

    public function anime()
    {
        $this->table_gen();
        $this->load->view('admin/pages/anime/index');
    }

    public function addanime()
    {
        $title = $this->input->post('InputTitle');
        $eps = $this->input->post('InputEpisode');
        $deskripsi = $this->input->post('InputDescription');
        $pecah = explode(".", $deskripsi, 3);
        $deskripsi_singkat = $pecah[0] . '.' . $pecah[1] . '.';
        $genre = json_encode($this->input->post('InputGenre'));
        $linkmal= $this->input->post('InputMalLink');

        if(isset($_FILES['InputImage']))
        {
        $fileimage = $this->cus_upload->upload();
            $data = array(
                'title' => $title,
                'eps' => $eps,
                'desc_panjang' => $deskripsi,
                'desc_pendek' => $deskripsi_singkat,
                'genre' => $genre,
                'image' => $fileimage["full_path"],
                'linkmal' => $linkmal
             );

        } else {
            $data = array(
                'title' => $title,
                'eps' => $eps,
                'desc_panjang' => $deskripsi,
                'desc_pendek' => $deskripsi_singkat,
                'genre' => $genre,
                'linkmal' => $linkmal
            );
        }
        if ($this->input->post('IdAnime') === FALSE) {

            $this->admin_model->add_anime($data);

           //echo "id anime:".$this->input->post('IdAnime');
            //print_r($data);

        } else {

            $id = $this->input->post('IdAnime');

            $this->admin_model->update_anime($id, $data);

            //echo "id anime:".$this->input->post('IdAnime');
            //print_r($data);
        }

       redirect('admin/anime/');
    }

    public function getData()
    {
        $anime_id = $this->input->post('id');
        $data[] = $this->admin_model->get_anime($anime_id);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
    }

    public function delete()
    {

    }

}