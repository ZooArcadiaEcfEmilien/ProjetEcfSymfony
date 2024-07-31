UPDATE events
SET name = :name, description = :description, date = :date, start_time = :start_time, end_time = :end_time, location = :location
WHERE id = :id;
