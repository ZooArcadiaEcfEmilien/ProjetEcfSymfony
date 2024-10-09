<?php

namespace App\Service;

use MongoDB\Database;
use MongoDB\BSON\ObjectId;

class EventService
{
    private $db;

    public function __construct(DatabaseService $databaseService)
    {
        $this->db = $databaseService->getDb(); // Obtenez la base de données MongoDB
    }

    public function createEvent($name, $description, $date, $startTime, $endTime, $location)
    {
        $eventData = [
            'name' => $name,
            'description' => $description,
            'date' => $date,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'location' => $location
        ];

        // Insérez le document dans la collection 'events'
        $this->db->events->insertOne($eventData);
    }

    public function getEvents()
    {
        // Récupérez tous les documents de la collection 'events'
        return $this->db->events->find()->toArray();
    }

    public function updateEvent($id, $name, $description, $date, $startTime, $endTime, $location)
    {
        $eventData = [
            'name' => $name,
            'description' => $description,
            'date' => $date,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'location' => $location
        ];

        // Mettez à jour le document avec l'ID spécifié
        $this->db->events->updateOne(
            ['_id' => new \MongoDB\BSON\ObjectId($id)],
            ['$set' => $eventData]
        );
    }

    public function deleteEvent($id)
    {
        // Supprimez le document avec l'ID spécifié
        $this->db->events->deleteOne(['_id' => new \MongoDB\BSON\ObjectId($id)]);
    }
}
