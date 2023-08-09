<?php

namespace App\Models;

use MF\Model\Model;

class Lista extends Model
{
    private $id;
    private $id_usuario;
    private $tarefa;

    private $id_status;
    private $acao;

    public function __get($attr)
    {
        return $this->$attr;
    }

    public function __set($attr, $value)
    {
        $this->$attr = $value;
    }

    public function salvar()
    {
        $query = "insert into tb_tarefas(id_usuario, tarefa, id_status) values (:id_usuario, :tarefa, :id_status)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
        $stmt->bindValue(':tarefa', $this->__get('tarefa'));
        $stmt->bindValue(':id_status', $this->__get('id_status'));
        $stmt->execute();

        return $this;

    }

    public function editar()
    {
        $query = "update tb_tarefas set tarefa = :tarefa where id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':tarefa', $this->__get('tarefa'));
        $stmt->bindValue(':id', $this->__get('id'));

        $stmt->execute();

        return $this;
    }

    public function remove()
    {
        $query = "delete from tb_tarefas where id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();
    }

    public function removeAll()
    {
        $query = "delete from tb_tarefas where id_usuario = :id_usuario";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $_SESSION['id']);
        $stmt->execute();
    }


    public function getAll()
    {
        $query = "
            select
                t.id,
                t.id_usuario,
                u.nome,
                t.tarefa,
                t.id_status
            from
                tb_tarefas as t
                left join usuarios as u on (t.id_usuario = u.id)
            where
                id_usuario = :id_usuario
            order by
                t.id desc
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $_SESSION['id']);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function getPendentes()
    {
        $query = "
        select
            t.id,
            t.id_usuario,
            u.nome,
            t.tarefa,
            t.id_status
        from
            tb_tarefas as t
            left join usuarios as u on (t.id_usuario = u.id)
        where
            id_usuario = :id_usuario and
            id_status = :id_status
        order by
            t.id desc
         ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $_SESSION['id']);
        $stmt->bindValue(':id_status', $this->__get('id_status'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
    }

    public function getCompletos()
    {
        $query = "
        select
            t.id,
            t.id_usuario,
            u.nome,
            t.tarefa,
            t.id_status
        from
            tb_tarefas as t
            left join usuarios as u on (t.id_usuario = u.id)
        where
            id_usuario = :id_usuario and
            id_status = :id_status
        order by
            t.id desc
         ";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $_SESSION['id']);
        $stmt->bindValue(':id_status', $this->__get('id_status'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
    }

    public function marcarRealizada(){
        $query = "update tb_tarefas set id_status = :id_status where id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_status', $this->__get('id_status'));
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();
        
    }

}

?>