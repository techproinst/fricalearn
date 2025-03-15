document.addEventListener("DOMContentLoaded", function () {
  const accordions = document.querySelectorAll(".accordion-item");

  accordions.forEach((item, index) => {
    const header = item.querySelector(".accordion-header");
    const content = item.querySelector(".accordion-content");
    const icon = item.querySelector(".icon");

    // Open the first accordion by default
    if (index === 0) {
      content.style.display = "block";
      icon.textContent = "✖"; // Change icon to 'X'
    }

    header.addEventListener("click", function () {
      const isOpen = content.style.display === "block";

      // Close all other accordions
      accordions.forEach((otherItem, otherIndex) => {
        if (otherIndex !== index) {
          otherItem.querySelector(".accordion-content").style.display =
            "none";
          otherItem.querySelector(".icon").textContent = "➕";
        }
      });

      // Toggle current accordion
      if (!isOpen) {
        content.style.display = "block";
        icon.textContent = "✖";
      } else {
        content.style.display = "none";
        icon.textContent = "➕";
      }
    });
  });


  document.getElementById('click').addEventListener('change', (event) => {
    document.body.classList.toggle('no-scroll', event.target.checked);
  })


});

