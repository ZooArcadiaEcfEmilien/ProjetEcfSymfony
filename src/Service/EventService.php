<?php

namespace App\Service;

use MongoDB\Database;
use MongoDB\BSON\ObjectId;

class EventService
{
    private $db;

    public function __construct(DatabaseService $databaseService)
    {
        $this->db = $databaseService->getDb();
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
        $this->db->events->insertOne($eventData);
    }

    public function getEvents()
    {
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

        $this->db->events->updateOne(
            ['_id' => new ObjectId($id)],
            ['$set' => $eventData]
        );
    }

    public function deleteEvent($id)
    {
        $this->db->events->deleteOne(['_id' => new ObjectId($id)]);
    }
}
