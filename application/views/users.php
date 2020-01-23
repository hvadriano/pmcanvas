<?php

/*
No início nós carregamos o template do menu. Depois de mostrar as visões, vamos atualizar este template para 
mostrar botões relevantes para a manutenção de usuário. Depois do menu temos um DIV container. 
Se a variável $users foi definida no controlador, uma tabela será criada. O cabeçalho é definido com ID, Email, Level, Date Created 
e as ações possíveis (Actions). Logo após o cabeçalho temos um loop no array de usuários que cria um TR para cada usuário. 
As ações são imagens com links para outros métodos no controlador. No caso da ação de remoção (remoce), 
adicionamos uma classe ‘remove-user-event’, que vai disparar um script jQuery para abrir um popup para confirmação. Depois vou explicar os scripts.
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