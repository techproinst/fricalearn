const phoneInput = document.querySelector("#phone");
      // Initialize intlTelInput
      const iti = window.intlTelInput(phoneInput, {
        initialCountry: "au", // Default country
        separateDialCode: true, // Shows country code separately
        preferredCountries: ["us", "gb", "ng", "ca"], // Preferred countries at top
        utilsScript:
          "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
      });