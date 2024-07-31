<?php

namespace App\Service;

class EventService
{
    private $pdo;

    public function __construct(DatabaseService $databaseService)
    {
        $this->pdo = $databaseService->getPdo();
    }

    public function createEvent($name, $description, $date, $startTime, $endTime, $location)
    {
        $sql = file_get_contents(__DIR__ . '/../scripts/insert_event.sql');
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':description' => $description,
            ':date' => $date,
            ':start_time' => $startTime,
            ':end_time' => $endTime,
            ':location' => $location
        ]);
    }

    public function getEvents()
    {
        $sql = file_get_contents(__DIR__ . '/../scripts/select_events.sql');
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function updateEvent($id, $name, $description, $date, $startTime, $endTime, $location)
    {
        $sql = file_get_contents(__DIR__ . '/../scripts/update_event.sql');
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':description' => $description,
            ':date' => $date,
            ':start_time' => $startTime,
            ':end_time' => $endTime,
            ':location' => $location
        ]);
    }

    public function deleteEvent($id)
    {
        $sql = file_get_contents(__DIR__ . '/../scripts/delete_event.sql');
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    }
}










