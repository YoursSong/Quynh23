document.addEventListener('DOMContentLoaded', function() {
    fetch('http://localhost:8081/api/hotels')
        .then(response => response.json())
        .then(data => {
            const userList = document.getElementById('userList');
            data.forEach(user => {
                const div = document.createElement('div');
                div.textContent = `Name: ${user.name}, Email: ${user.email}`;
                userList.appendChild(div);
            });
        })
        .catch(error => console.error('Error:', error));
});