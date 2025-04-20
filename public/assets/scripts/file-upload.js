document
    .getElementById("upload")
    .addEventListener("change", function () {
        let fileName =
            this.files.length > 0 ? this.files[0].name : "File Name";
        document.querySelector(".file-name").textContent = fileName;
    });
