
const dropdownButton = document.getElementById('dropdownButton');
const dropdownMenu = document.getElementById('dropdownMenu');

// Toggle dropdown menu visibility
dropdownButton.addEventListener('click', () => {
dropdownMenu.classList.toggle('hidden');
});

// Close the dropdown if clicked outside
document.addEventListener('click', (event) => {
if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
    dropdownMenu.classList.add('hidden');
}
});