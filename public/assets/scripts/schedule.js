
document.addEventListener("DOMContentLoaded", function () {
  const timeSlots = document.querySelectorAll(".time-wrapper");

  timeSlots.forEach((slot) => {
    slot.addEventListener("click", function () {
      let selectedDay = this.getAttribute("data-day");
      let selectedTime = this.getAttribute("data-time");
      let selectedSession = this.getAttribute('data-session');

      // Clear all selections across all days
      document.querySelectorAll(".time-wrapper").forEach(item =>
        item.classList.remove("selected")
      );

      // Clear the hidden inputs for day and time
      document.getElementById("selected_day").value = "";
      document.getElementById("selected_time").value = "";
      document.getElementById("selected_session").value = "";

      // Add selected class to the clicked time slot
      this.classList.add("selected");

      // Update the hidden input field dynamically
      document.getElementById("selected_day").value = selectedDay;
      document.getElementById("selected_time").value = selectedTime;
      document.getElementById("selected_session").value = selectedSession;

      // Show toast message
      showToast(`${selectedDay} time slot at ${selectedTime} selected!`);
    });
  });

  // Function to show toast message
  function showToast(message) {
    const toast = document.createElement("div");
    toast.classList.add("toast-message");
    toast.textContent = message;

    // Append it to the body
    document.body.appendChild(toast);

    // Auto-hide the toast after 3 seconds
    setTimeout(() => {
      toast.remove();
    }, 3000);
  }
});






