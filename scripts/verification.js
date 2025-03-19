document.addEventListener("DOMContentLoaded", function () {
  const otpInputs = document.querySelectorAll(".otp-input");

  otpInputs.forEach((input, index) => {
      input.addEventListener("input", (e) => {
          if (e.target.value.length === 1 && index < otpInputs.length - 1) {
              otpInputs[index + 1].focus();
          }
      });

      input.addEventListener("keydown", (e) => {
          if (e.key === "Backspace" && index > 0 && !e.target.value) {
              otpInputs[index - 1].focus();
          }
      });
  });
});
