<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {

	// O m�todo index vai carregar a vis�o login, enviando o page_title como �Login�.
    public function index()
    {
        // Load View
        $data['page_title']  = "Login";
 
        $data['email'] = '';
        $data['password'] = '';
        
        if ( isset( $_GET[ 'msg' ] ) && $_GET[ 'msg' ] == "falha" ) $data['error'] = true;
 
        $this->templateadmin->show('admin/login', $data);
    }

	 
	/*
	N�s precisamos de mais um m�todo para validar o login e criar a sess�o de usu�rio.
	
	Para validar as credenciais do usu�rio, o m�todo validate() vai executar o m�todo que acabamos de criar no nosso modelo. 
	Ele vai enviar a informa��o enviada via post do email e password. Se algo for encontrado, o resultado ser� atribu�do a $result, 
	levando a defini��o da sess�o. Na vari�vel de sess�o n�s definimos logged como true (isso ser� usado para validar se o usu�rio est� logado 
	nos outros controladores), o ID do usu�rio e o n�vel do usu�rio. 
	Depois disso o usu�rio ser� redirecionado para o dashboard (que vamos criar mais adiante).
	Se as credenciais do usu�rio forem inv�lidas, a vari�vel $result estar� vazia, e o a vis�o login ser� carregada novamente. 
	Desta vez a vari�vel error ser� definida como true, ent�o uma mensagem aparecer� na nossa vis�o.
	*/
	public function validate()
	{
		$this->load->model('usuariomodel');
		$result = $this->usuariomodel->validate($this->input->post('email'),$this->input->post('password'));
	 
		if($result) {
			$this->session->set_userdata(array(
				'logged' => true,
				'result'  => $result
			));
	 
			redirect('admin/home');
			
		} else {
			// Load View
			$data['page_title']  = "Login";
	 
			$data['email'] = $this->input->post('email');
			$data['password'] = $this->input->post('password');
	 
			$data['error'] = true;
	 
			$this->templateadmin->show('admin/login', $data);
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('logged');
	 
		redirect('admin/login');
	}
	
	
	public function form_recuperar_senha($msg = FALSE)
	{
		if($msg && isset($this->_msg[$msg])) $data['mensagem'] = $this->_msg[$msg];
		
		$result = $this->session->userdata('result');
		$data['result'] = $result;
		
		$data['usuario'] = $result['usuario'];
		
		
		$data['page_title']  = "Home Sistema Administrador";
        $data['content'] = "Sistema Administrador "  + MENU_TITLE;

        if(isset($result['temPermissao'])) $data['temPermissao'] = $result['temPermissao'];
        
        // Load View
        $this->templateadmin->show('admin/recuperar_senha', $data);
	}
 
}