<?php
    require_once ('app/tarefa.model.php');
    require_once ('app/tarefa.service.php');
    require_once ('app/conexao.php');

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao == 'inserir'){
        $tarefa = new Tarefa();
        $tarefa->__set('tarefa', $_POST['tarefa']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);

        $tarefaService->inserir();

        header('Location: nova_tarefa.php?inclusao=1');
    }

    if($acao == 'recuperar'){
        echo 'chegamos ate aqui';
    }