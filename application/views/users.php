<?php

/*
No in�cio n�s carregamos o template do menu. Depois de mostrar as vis�es, vamos atualizar este template para 
mostrar bot�es relevantes para a manuten��o de usu�rio. Depois do menu temos um DIV container. 
Se a vari�vel $users foi definida no controlador, uma tabela ser� criada. O cabe�alho � definido com ID, Email, Level, Date Created 
e as a��es poss�veis (Actions). Logo ap�s o cabe�alho temos um loop no array de usu�rios que cria um TR para cada usu�rio. 
As a��es s�o imagens com links para outros m�todos no controlador. No caso da a��o de remo��o (remoce), 
adicionamos uma classe �remove-user-event�, que vai disparar um script jQuery para abrir um popup para confirma��o. Depois vou explicar os scripts.
*/

// Load Menu
$this->template->menu('users');
?>
 
<div id="container">
    <?php if(isset($users)) { ?>
    <table id="users_table">
        <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Level</th>
        <th>Date Created</th>
        <th>Actions</th>
        </tr>
    <?php foreach ($users as $user) { ?>
        <tr id="user_<?php echo $user['id']; ?>">
        <td><?php echo $user['id']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php echo $level_list[$user['level']]; ?></td>
        <td><?php echo date("j/M/Y, g:i a", strtotime($user['date_created'])); ?></td>
        <td>
            <?php echo anchor('user/edit/'.$user['id'], '<img src="images/edit.png" title="Edit User"/>'); ?>
            <?php echo anchor('user/remove/'.$user['id'], '<img src="images/remove.png" title="Remove User"/>', 'class="remove-user-event"'); ?>
        </td>
        </tr>
    <?php } ?>
    </div>
    <?php } ?>
</div>