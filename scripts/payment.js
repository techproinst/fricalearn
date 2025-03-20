document
.getElementById("receiptUpload")
.addEventListener("change", function () {
  let fileName =
    this.files.length > 0 ? this.files[0].name : "File Name";
  document.querySelector(".file-name").textContent = fileName;
});

const buttons = document.querySelectorAll(".account");
const nairaBtn = document.querySelector(".naira-btn");
const poundsBtn = document.querySelector(".pounds-btn");
const nairaDetails = document.querySelector(".naira-details");
const poundsDetails = document.querySelector(".pounds-details");

nairaBtn.classList.add("clicked");
nairaDetails.style.display = "block";
poundsDetails.style.display = "none";

buttons.forEach((btn, index) =>
btn.addEventListener("click", () => {
  buttons.forEach((b) => b.classList.remove("clicked"));

  if (index === 1) {
    nairaBtn.classList.remove("clicked");
    nairaDetails.style.display = "none";
    poundsDetails.style.display = "block";
    poundsBtn.classList.add("clicked");
  }
  if (index === 0) {
    poundsBtn.classList.remove("clicked");
    nairaDetails.style.display = "block";
    poundsDetails.style.display = "none";
    nairaBtn.classList.add("clicked");
  }

  btn.classList.add("clicked");
})
);

