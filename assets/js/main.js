const menuButton = document.getElementById("menuButton");
const sideMenu = document.getElementById("sideMenu");
const exit = document.getElementById("exit");
const dropdownButton = document.getElementById('dropdownButton');
const dropdownMenu = document.getElementById('dropdownMenu');

menuButton.addEventListener("click", handleShow);
exit.addEventListener("click", handleExit);

function handleShow() {
    sideMenu.classList.remove("hidden");
    sideMenu.classList.add("flex");
}

function handleExit() {
    sideMenu.classList.remove("flex");
    sideMenu.classList.add("hidden");
}

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