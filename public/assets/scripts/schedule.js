document.addEventListener("DOMContentLoaded", function () {
  const timeSlots = document.querySelectorAll(".time-wrapper");

  timeSlots.forEach((slot) => {
    slot.addEventListener("click", function () {
      let selectedDay = this.getAttribute("data-day");
      let selectedTime = this.getAttribute("data-time");


      // Remove the 'selected' class from all time slots of the same day
      document
        .querySelectorAll(`.time-wrapper[data-day="${selectedDay}"]`)
        .forEach((item) => item.classList.remove("selected"));

      //Add the 'selected' class to the clicked time slot
      this.classList.add("selected");


      document.querySelectorAll(`.card[data-day="${selectedDay}"]`)
        .forEach(item => item.classList.remove('selected'));

      this.closest('.card').classList.add('selected');

      setTimeout(() => {
        this.closest('.card').classList.remove('selected');

      }, 2000);


      // Update the hidden input field based on the selected day
      if (selectedDay === "Monday") {
        document.getElementById("monday_time").value = selectedTime;
      } else if (selectedDay === "Wednesday") {
        document.getElementById("wednesday_time").value = selectedTime;
      } else if (selectedDay === "Friday") {
        document.getElementById("friday_time").value = selectedTime;
      }
    });
  });
});