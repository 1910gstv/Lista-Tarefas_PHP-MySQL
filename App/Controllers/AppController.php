<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;


class AppController extends Action
{

    public function lista()
    {
        $this->validaAutenticacao();

        $tarefa = Container::getModel('Lista');

        $tarefas = $tarefa->getAll();
        $this->view->tarefas = $tarefas;

        $usuario = Container::getModel('Usuario');
        $usuario->__set('id', $_SESSION['id']);


        $this->render('lista');
    }

    public function listar_tarefa()
    {
        $this->validaAutenticacao();

        $tarefa = Container::getModel('Lista');

        $tarefa->__set('tarefa', $_POST['tarefa']);
        $tarefa->__set('id_usuario', $_SESSION['id']);
        $tarefa->__set('id_status', 1);

        $tarefa->salvar();

        header('Location: /lista');
    }

    public function acao()
    {
        $this->validaAutenticacao();

        $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
        $id_tarefa = isset($_GET['id']) ? $_GET['id'] : '';

        $tarefa = Container::getModel('Lista');
        $tarefa->__set('id', $id_tarefa);

        print_r($acao);
        // if($acao == 'editar') {
        //     $tarefa->editar();

        //     header('Location: /lista');
        // }
    }

    public function validaAutenticacao()
    {
        session_start();

        if (!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
            header('Location: /?login=erro');
        }
    }

    public function acaoTarefa()
    {
        $acao = isset($_GET['acao']) ? $_GET['acao'] : '';

        if ($acao == 'editar') {
            $this->validaAutenticacao();

            $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
            $id_tarefa = isset($_POST['id']) ? $_POST['id'] : '';

            $tarefa = Container::getModel('Lista');
            $tarefa->__set('id', $id_tarefa);
            $tarefa->__set('tarefa', $_POST['tarefa']);

            $tarefa->editar();

            header('Location: /lista');

        } else if ($acao == 'remover') {
            $this->validaAutenticacao();

            $id = isset($_GET['id']) ? $_GET['id'] : '';
            $tarefa = Container::getModel('Lista');
            $tarefa->__set('id', $id);
            $tarefa->remove();

            header('Location: /lista');

        } else if ($acao == 'removerTudo') {
            $this->validaAutenticacao();

            $tarefa = Container::getModel('Lista');
            $tarefa->removeAll();

            //header('Location: /lista');

        } else if ($acao == 'recuperarPendentes') {
            $this->validaAutenticacao();

            $tarefa = Container::getModel('Lista');
            $tarefa->__set('id_status', 1);
    
            $tarefas = $tarefa->getPendentes();
            $this->view->tarefas = $tarefas;
    
            $this->render('lista');

        } else if($acao == 'marcarRealizada') {
            $this->validaAutenticacao();

            $tarefa = Container::getModel('Lista');
            $tarefa->__set('id', $_GET['id']);
            $tarefa->__set('id_status', 2);

            $tarefas = $tarefa->marcarRealizada();

            header('Location: /lista');
        } else if($acao == 'recuperarCompletos') {
            $this->validaAutenticacao();

            $tarefa = Container::getModel('Lista');
            $tarefa->__set('id_status', 2);
    
            $tarefas = $tarefa->getCompletos();
            $this->view->tarefas = $tarefas;
    
            $this->render('lista');
        }
    }


}
?>