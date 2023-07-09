<?php

namespace App\Repositories;
use App\Models\NoteModel;

class NoteRepository
{
    private $noteModel;
    public function __construct()
    {
        $this->noteModel = new NoteModel;
    }

    public function listNotes()
    {
        return $this->noteModel->findAll();
    }

    public function getNoteById($id)
    {
        return $this->noteModel->find($id);
    }

    public function createNote($dataRequest)
    {
        return $this->noteModel->insert($dataRequest);
    }

    public function updateNote($id, $dataRequest)
    {
        return $this->noteModel->update($id, $dataRequest);
    }

    public function deleteNote($id)
    {
        if ($this->getNoteById($id)) {
            $this->noteModel->delete($id);
            return true;
        }
        return false;
    }
}