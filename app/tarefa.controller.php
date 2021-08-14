<?php
    require_once ('app/tarefa.model.php');
    require_once ('app/tarefa.service.php');
    require_once ('app/conexao.php');


    $tarefa = new Tarefa();
    $tarefa->__set('tarefa', $_POST['tarefa']);

    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);

    $tarefaService->inserir();

    header('Location: nova_tarefa.php?inclusao=1');