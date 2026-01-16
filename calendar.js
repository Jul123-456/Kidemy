// Get calendar elements
const calendar = document.getElementById("calendarDays");
const btnLeft = document.querySelector(".scroll-btn.left");
const btnRight = document.querySelector(".scroll-btn.right");

// Scroll left when left button clicked
btnLeft.addEventListener("click", () => {
    calendar.scrollBy({ left: -100, behavior: "smooth" });
});

// Scroll right when right button clicked
btnRight.addEventListener("click", () => {
    calendar.scrollBy({ left: 100, behavior: "smooth" });
});

// Highlight today automatically
const today = new Date().getDate();
document.querySelectorAll(".calendar-days .day").forEach(day => {
    if (parseInt(day.querySelector("strong").textContent) === today) {
        day.classList.add("active");
    }
});
