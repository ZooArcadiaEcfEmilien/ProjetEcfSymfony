<?php

namespace App\Controller;

use App\Service\EventService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class EventController extends AbstractController
{
    private $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    #[Route('/events', name: 'event_list', methods: ['GET'])]
    public function list(): Response
    {
        $events = $this->eventService->getEvents();
        return $this->render('Event.html.twig', ['events' => $events]);
    }

    #[Route('/api/events', name: 'api_event_list', methods: ['GET'])]
    public function apiEventList(): JsonResponse
    {
        $events = $this->eventService->getEvents();
        $data = [];

        foreach ($events as $event) {
            $data[] = [
                'id' => $event['id'],
                'name' => $event['name'],
                'description' => $event['description'],
                'date' => $event['date'],
                'start_time' => $event['start_time'],
                'end_time' => $event['end_time'],
                'location' => $event['location'],
            ];
        }

        return $this->json($data);
    }

    #[Route('/api/event/add', name: 'api_event_add', methods: ['POST'])]
    public function apiEventAdd(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $this->eventService->createEvent(
            $data['name'],
            $data['description'],
            $data['date'],
            $data['start_time'],
            $data['end_time'],
            $data['location']
        );

        return $this->json(['status' => 'Event created successfully!']);
    }
}
