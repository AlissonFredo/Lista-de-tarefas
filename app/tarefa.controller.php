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
        $tarefa = new Tarefa();
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperar();
    }

    if($acao == 'recuperarPendentes'){
        $tarefa = new Tarefa();
        $tarefa->__set('id_status', 1);
        
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperarPendentes();
    }

    if($acao == 'atualizar'){
        $tarefa = new Tarefa();
        $tarefa->__set('tarefa', $_POST['tarefa']);
        $tarefa->__set('id', $_POST['id']);

        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        
        if($tarefaService->atualizar()){
            if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
                header('Location: index.php');
            }else{
                header('Location: todas_tarefas.php');
            }
        }
    }

    if($acao == 'remover'){
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);

        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->remover();

        if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
            header('Location: index.php');
        }else{
            header('Location: todas_tarefas.php');
        }
    }

    if($acao == 'marcaRealizada'){
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);
        $tarefa->__set('id_status', 2);

        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->marcaRealizada();

        if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
            header('Location: index.php');
        }else{
            header('Location: todas_tarefas.php');
        }

    }