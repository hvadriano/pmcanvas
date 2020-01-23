<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {

	// O método index vai carregar a visão login, enviando o page_title como “Login”.
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
	Nós precisamos de mais um método para validar o login e criar a sessão de usuário.
	
	Para validar as credenciais do usuário, o método validate() vai executar o método que acabamos de criar no nosso modelo. 
	Ele vai enviar a informação enviada via post do email e password. Se algo for encontrado, o resultado será atribuído a $result, 
	levando a definição da sessão. Na variável de sessão nós definimos logged como true (isso será usado para validar se o usuário está logado 
	nos outros controladores), o ID do usuário e o nível do usuário. 
	Depois disso o usuário será redirecionado para o dashboard (que vamos criar mais adiante).
	Se as credenciais do usuário forem inválidas, a variável $result estará vazia, e o a visão login será carregada novamente. 
	Desta vez a variável error será definida como true, então uma mensagem aparecerá na nossa visão.
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