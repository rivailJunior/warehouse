<?php 

	/**
	*
	Controller criado para mapear toda a roda do sistema.
	Carregamento inicial de views estao todos aqui. 
	*/
	class Admcontroller extends CI_Controller
	{
		public $data = array();
		public $breadcrumb = array();

		function __construct(){
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->model("genericmodel");
			setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
            date_default_timezone_set('America/Sao_Paulo');
            
			if(!$this->session->userdata('usuariologado')) 
			{
				redirect('/logincontroller/show_login');
			}
			$this->data['usuario'] = $this->session->cookie->userdata['usuariologado'];

		}
		
		
		function index()
		{
			$user = $this->data['usuario'];
			$this->data['fotos'] = $this->db->get('imagem');
			$this->data['pro'] = $this->db->get("produto");
			$this->data['categoria'] = $this->db->get('categoria');
			$this->data['usuarios'] = $this->db->get_where('usuarios', array('status'=>'ativo'));
			$this->data['for'] = $this->db->get('fornecedor');
			$sqlsessao = "select * from sessao where idusuario = ".$user['id']." order by id desc";
			$this->data['sessao'] = $this->db->query($sqlsessao);
			$this->data['datasessao'] = $this->data['sessao']->row(1)->ultimasessao;
                                                
			
			$this->load->view('index', $this->data);
			$this->load->view('dashboard/dashboard', $this->data);
			$this->load->view('footer');
		}

		/**
			usuario
		*/

		function usuario() {
			$this->data['breadcrumb']['title'] = "Usuario";
			$this->data['breadcrumb']['link'] = site_url('admcontroller/usuario'); 
			$this->load->view('index', $this->data);
			$this->load->view('usuario/list');
			$this->load->view('footer');
		}
		
		function usuarioadd() {
			$this->data['breadcrumb']['title'] = "Usuario";
			$this->data['breadcrumb']['link'] = site_url('admcontroller/usuario'); 
			$this->data['breadcrumb']['subtitle'] = 'Novo'; 
			
			$this->load->view('index', $this->data);
			$this->data['user'] = "";
			$this->load->view('usuario/add',$this->data);
			$this->load->view('footer');
		}
		
		function usuarioeditar($id)
		{
			$this->data['breadcrumb']['title'] = "Usuario";
			$this->data['breadcrumb']['link'] = site_url('admcontroller/usuario'); 
			$this->data['breadcrumb']['subtitle'] = 'editar'; 
			
			$this->load->view('index', $this->data);
			$this->data['user'] = $this->genericmodel->selectPorId("usuarios","id",$id);
			$this->load->view('usuario/edit', $this->data);
			$this->load->view('footer');
		}

		/**
			empresa
		**/
		function empresa() {
			$id = 1;
			$this->data['emp'] = $this->genericmodel->selectPorId("empresa","id",$id);
			$this->data['breadcrumb']['title'] = "Empresa";
			$this->data['breadcrumb']['link'] = site_url('admcontroller/empresa'); 
			$this->load->view('index', $this->data);
			$this->load->view('empresa/edit');
			$this->load->view('footer');
		}

		/**
			categoria
		*/
		function categoria() {
			$this->data['breadcrumb']['title'] = "Categoria";
			$this->data['breadcrumb']['link'] = site_url('admcontroller/categoria'); 
			$this->load->view('index', $this->data);
			$this->load->view('categoria/list');
			$this->load->view('footer');
		}

		function categoriaadd() {
			$this->data['breadcrumb']['title'] = "Categoria";
			$this->data['breadcrumb']['link'] = site_url('admcontroller/categoria'); 
			$this->data['breadcrumb']['subtitle'] = 'Novo'; 

			$this->load->view('index', $this->data);
			$this->data['user'] = "";
			$this->load->view('categoria/add',$this->data);
			$this->load->view('footer');
		}

		function categoriaeditar($id) {
			$this->data['breadcrumb']['title'] = "Categoria";
			$this->data['breadcrumb']['link'] = site_url('admcontroller/categoria'); 
			$this->data['breadcrumb']['subtitle'] = 'editar'; 

			$this->load->view('index', $this->data);
			$this->data['cat'] = $this->genericmodel->selectPorId("categoria","id",$id);
			$this->load->view('categoria/edit', $this->data);
			$this->load->view('footer');
		}
		/**
			produto
		*/

		function produto(){
			$this->data['breadcrumb']['title'] = "Produto";
			$this->data['breadcrumb']['link'] = site_url('admcontroller/produto'); 
			$this->load->view('index', $this->data);
			$this->load->view('produto/list');
			$this->load->view('footer');
		}

		function produtoadd() {
			$this->data['breadcrumb']['title'] = "Produto";
			$this->data['breadcrumb']['link'] = site_url('admcontroller/produto'); 
			$this->data['breadcrumb']['subtitle'] = 'Novo'; 

			$this->load->view('index', $this->data);
			$this->data['user'] = "";
			$this->load->view('produto/add',$this->data);
			$this->load->view('footer');
		}

		function produtoeditar($id) {
			$this->data['breadcrumb']['title'] = "Produto";
			$this->data['breadcrumb']['link'] = site_url('admcontroller/produto'); 
			$this->data['breadcrumb']['subtitle'] = 'editar'; 

			$this->load->view('index', $this->data);
			$sql = "select *, p.id as idproduto from produto p 
					where p.id = ".$id;
			$this->data['pro'] = $this->db->query($sql);
			
			$this->load->view('produto/edit', $this->data);
			$this->load->view('footer');
		}

		/**
			banner
		*/

		function banner(){
			$this->data['breadcrumb']['title'] = "Banner";
			$this->data['breadcrumb']['link'] = site_url('admcontroller/banner'); 
			$this->load->view('index', $this->data);
			$this->load->view('banner/list');
			$this->load->view('footer');
		}

		function bannereditar($id) {
			$this->data['breadcrumb']['title'] = "Banner";
			$this->data['breadcrumb']['link'] = site_url('admcontroller/banner'); 
			$this->data['breadcrumb']['subtitle'] = 'editar'; 

			$this->load->view('index', $this->data);
			$sql = "select * from banner where id = ".$id;
			$this->data['ban'] = $this->db->query($sql);
			$this->load->view('banner/edit', $this->data);
			$this->load->view('footer');
		}

		function banneradd() {
			$this->data['breadcrumb']['title'] = "Banner";
			$this->data['breadcrumb']['link'] = site_url('admcontroller/banner'); 
			$this->data['breadcrumb']['subtitle'] = 'Novo'; 

			$this->load->view('index', $this->data);
			$this->data['user'] = "";
			$this->load->view('banner/add',$this->data);
			$this->load->view('footer');
		}
		/**
		fornecedor
		*/

		function fornecedor(){
			$this->data['breadcrumb']['title'] = "Fornecedor";
			$this->data['breadcrumb']['link'] = site_url('admcontroller/fornecedor'); 
			$this->load->view('index', $this->data);
			$this->load->view('fornecedor/list');
			$this->load->view('footer');
		}

		function fornecedoradd() {
			$this->data['breadcrumb']['title'] = "Fornecedor";
			$this->data['breadcrumb']['link'] = site_url('admcontroller/fornecedor'); 
			$this->data['breadcrumb']['subtitle'] = 'Novo'; 

			$this->load->view('index', $this->data);
			$this->data['user'] = "";
			$this->load->view('fornecedor/add',$this->data);
			$this->load->view('footer');
		}


	}
 ?>