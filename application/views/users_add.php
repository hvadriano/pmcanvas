<?php

/*
Depois do menu temos o mesmo DIV container. Dentro deste container temos um formul�rio com a a��o �user/save� (controlador user, m�todo save) e uma tabela com todos os campos. O campo email � um campo texto. A senha � um campo password, mas ele tem uma checkbox ao lado. Essa checkbox vai habilitar a altera��o da senha � j� que n�o enviamos a senha para o frontend no controlador, n�o podemos salvar o valor ou ent�o apagar�amos a senha original. Caso o usu�rio queira alterar a senha, ele pode marcar a checkbox e digitar a nova senha. Depois criaremos um JavaScript para habilitar/desabilitar o campo. O �ltimo campo � o level (n�vel), que � um dropdown com os valores do array $level_list.

Na �ltima se��o da nossa tabela temos um campo ID escondido. Ele s� vai aparecer quando a vari�vel $id for definida. Deste modo podemos saber se � um novo usu�rio ou uma atualiza��o. Depois temos um DIV com a classe �form-save-buttons� que cont�m os bot�es para salvar e cancelar. O bot�o de salvar vai submeter o formul�rio, enquanto o cancel vai enviar o usu�rio de volta na hist�ria do browser. Lembre-se sempre de fechar o formul�rio utilizando a fun��o form_close().
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