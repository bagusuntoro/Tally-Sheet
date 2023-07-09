<?php

namespace App\Services;
use App\Repositories\NoteRepository;

class NoteService
{
    private $noteRepository;
    public function __construct()
    {
        $this->noteRepository = new NoteRepository;
    }

    public function listNotes()
    {
        return $this->noteRepository->listNotes();
    }

    public function getNoteById($id)
    {
        return $this->noteRepository->getNoteById($id);
    }

    public function createNote($dataRequest)
    {
        return $this->noteRepository->createNote($dataRequest);
    }

    public function updateNote($id, $dataRequest)
    {
        return $this->noteRepository->updateNote($id, $dataRequest);
    }

    public function deleteNote($id)
    {
        return $this->noteRepository->deleteNote($id);
    }

}