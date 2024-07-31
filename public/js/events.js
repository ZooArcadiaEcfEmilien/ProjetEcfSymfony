document.addEventListener('DOMContentLoaded', function() {
    function loadEvents() {
        fetch('/api/events')
            .then(response => response.json())
            .then(data => {
                const tableBody = document.querySelector('#events-table tbody');
                tableBody.innerHTML = '';
                data.forEach(event => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${event.name}</td>
                        <td>${event.description}</td>
                        <td>${new Date(event.date).toLocaleDateString()}</td>
                        <td>${new Date(event.start_time).toLocaleTimeString()}</td>
                        <td>${new Date(event.end_time).toLocaleTimeString()}</td>
                        <td>${event.location}</td>
                    `;
                    tableBody.appendChild(row);
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
