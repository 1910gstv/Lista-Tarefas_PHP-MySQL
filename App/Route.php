<?php

    namespace App;

    use MF\Init\Bootstrap;

    class Route extends Bootstrap{

        public function initRoutes() {
            
            $routes['home'] = array(
                'route' => '/',
                'controller' => 'IndexController',
                'action' => 'index'
            );

            $routes['inscreverse'] = array (
                'route' => '/inscreverse',
                'controller' => 'IndexController',
                'action' => 'inscreverse'
            );

            $routes['registrar'] = array (
                'route' => '/registrar',
                'controller' => 'IndexController',
                'action' => 'registrar'
            );

            $routes['autenticar'] = array(
                'route' => '/autenticar',
                'controller' => 'AuthController',
                'action' => 'autenticar'
            );

            $routes['lista'] = array (
                'route' => '/lista',
                'controller' => 'AppController',
                'action' => 'lista'
            );

            $routes['listar_tarefa'] = array (
                'route' => '/listar_tarefa',
                'controller' => 'AppController',
                'action' => 'listar_tarefa'
            );

            
            $routes['editar'] = array (
                'route' => '/editar',
                'controller' => 'AppController',
                'action' => 'editar'
            );
            
            /*
            $routes['remove'] = array (
                'route' => '/lista/remove',
                'controller' => 'AppController',
                'action' => 'remove'
            );
            */
            
            $routes['sair'] = array (
                'route' => '/sair',
                'controller' => 'AuthController',
                'action' => 'sair'
            );

            /*
            $routes['pendentes'] = array (
                'route' => '/lista/pendentes',
                'controller' => 'AppController',
                'action' => 'recuperaPendentes'
            );

            $routes['marcarRealizada'] = array (
                'route' => '/lista/marcarRealizada',
                'controller' => 'AppController',
                'action' => 'marcaRealizada'
            );
            */

            $routes['acao'] = array (
                'route' => '/lista/acao',
                'controller' => 'AppController',
                'action' => 'acaoTarefa'
            );


            $this->setRoutes($routes);

        }

    }

?>