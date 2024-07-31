document.addEventListener('DOMContentLoaded', function() {
    function loadEvents() {
        fetch('/api/events')
            .then(response => response.json())
            .then(data => {
                const tableBody = document.querySelector('#events-table tbody');
                tableBody.innerHTML = '';

                data.forEach(event => {
                    const eventDate = new Date(event.date);
                    const startTime = new Date(`${event.date}T${event.start_time}`);
                    const endTime = new Date(`${event.date}T${event.end_time}`);

                    if (isNaN(eventDate.getTime()) || isNaN(startTime.getTime()) || isNaN(endTime.getTime())) {
                        console.error("Invalid date or time format for event: ", event);
                    } else {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${event.name}</td>
                            <td>${event.description}</td>
                            <td>${eventDate.toLocaleDateString()}</td>
                            <td>${startTime.toLocaleTimeString([], {hour: '2-digit', minute: '2-digit'})}</td>
                            <td>${endTime.toLocaleTimeString([], {hour: '2-digit', minute: '2-digit'})}</td>
                            <td>${event.location}</td>
                        `;
                        tableBody.appendChild(row);
                    }
                });
            });
    }
    function addEvent(event) {
        event.preventDefault();
        const formData = new FormData(event.target);

        const data = {
            name: formData.get('name'),
            description: formData.get('description'),
            date: formData.get('date'),
            start_time: formData.get('start_time'),
            end_time: formData.get('end_time'),
            location: formData.get('location')
        };
        fetch('/api/event/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(result => {
            alert(result.status);
            loadEvents();
            document.querySelector('#event-form').reset();
        });
    }

    const form = document.querySelector('#event-form');
    form.addEventListener('submit', addEvent);

    loadEvents();
});
