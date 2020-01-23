<?php

/*
Depois do menu temos o mesmo DIV container. Dentro deste container temos um formulário com a ação ‘user/save’ (controlador user, método save) e uma tabela com todos os campos. O campo email é um campo texto. A senha é um campo password, mas ele tem uma checkbox ao lado. Essa checkbox vai habilitar a alteração da senha – já que não enviamos a senha para o frontend no controlador, não podemos salvar o valor ou então apagaríamos a senha original. Caso o usuário queira alterar a senha, ele pode marcar a checkbox e digitar a nova senha. Depois criaremos um JavaScript para habilitar/desabilitar o campo. O último campo é o level (nível), que é um dropdown com os valores do array $level_list.

Na última seção da nossa tabela temos um campo ID escondido. Ele só vai aparecer quando a variável $id for definida. Deste modo podemos saber se é um novo usuário ou uma atualização. Depois temos um DIV com a classe ‘form-save-buttons’ que contém os botões para salvar e cancelar. O botão de salvar vai submeter o formulário, enquanto o cancel vai enviar o usuário de volta na história do browser. Lembre-se sempre de fechar o formulário utilizando a função form_close().
*/

// Load Menu
$this->template->menu('users');
?>
 
<div id="container">
 
    <?php echo form_open('user/save'); ?>
 
    <table>
        <tr>
            <td>
            <?php echo form_label('Email', 'email'); ?>
            </td>
            <td>
            <?php echo form_input('email', $email); ?>
            </td>
        </tr>
        <tr>
            <td>
            <?php echo form_label('Password', 'password'); ?>
            </td>
            <td>
            <?php if (isset($id)) { ?>
                <?php echo form_password('password', $password, 'id="password" disabled'); ?>
                <?php echo form_checkbox('reset_password', 1, false, 'id="reset_password" title="Edit Password"'); ?>
            <?php } else { ?>
                <?php echo form_password('password', $password, 'id="password"'); ?>
                <?php echo form_hidden('reset_password', 1); ?>
            <?php } ?>
            </td>
        </tr>
        <tr>
            <td>
            <?php echo form_label('Level', 'level'); ?>
            </td>
            <td>
            <?php echo form_dropdown('level', $level_list, $level); ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <?php if (isset($id)) echo form_hidden('id', $id); ?>
            <div class="form-save-buttons">
                <?php echo form_submit('save', 'Save', 'class="btn-blue"'); ?>
                <?php echo form_button('cancel', 'Cancel', 'class="btn-blue" onClick="history.go(-1)"'); ?>
            </div>
            </td>
        </tr>
    </table>
 
    <?php echo form_close(); ?>
 
</div>