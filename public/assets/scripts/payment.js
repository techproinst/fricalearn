document
  .getElementById("receiptUpload")
  .addEventListener("change", function () {
    let fileName =
      this.files.length > 0 ? this.files[0].name : "File Name";
    document.querySelector(".file-name").textContent = fileName;
  });

const buttons = document.querySelectorAll(".account");
const africaBtn = document.querySelector(".africa-btn");
const otherBtn = document.querySelector(".other-btn");
const africaDetails = document.querySelector(".africa-details");
const otherDetails = document.querySelector(".other-details");

//africaBtn.classList.add("clicked");
africaDetails.style.display = "block";
otherDetails.style.display = "none";


buttons.forEach((btn, index) =>
  btn.addEventListener("click", () => {
    buttons.forEach((b) => b.classList.remove("clicked"));

    if (index === 1) {
      africaBtn.classList.remove("clicked");
      africaDetails.style.display = "none";
      otherDetails.style.display = "block";
      otherBtn.classList.add("clicked");
    }
    if (index === 0) {
      otherBtn.classList.remove("clicked");
      africaDetails.style.display = "block";
      otherDetails.style.display = "none";
      africaBtn.classList.add("clicked");
    }

    btn.classList.add("clicked");
  })
);

document.querySelectorAll(".account").forEach((button) => button.addEventListener('click', () => {

}))