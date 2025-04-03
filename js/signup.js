window.addEventListener("load", function (event) {
    let otherCheck = document.getElementById("otherCheck");

    otherCheck.addEventListener("change", function () {
        let otherInstrument = document.getElementById("otherInstrument");

        if (this.checked) {
            otherInstrument.style.display = "block";
        }
    });
});