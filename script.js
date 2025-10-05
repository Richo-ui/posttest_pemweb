const modal = document.getElementById("donationModal");
const btnDonate = document.getElementById("btn-donate");
const closeBtn = document.querySelector(".close");

btnDonate.addEventListener("click", () => {
    modal.style.display = "flex";
});

closeBtn.addEventListener("click", () => {
    modal.style.display = "none";
});

window.addEventListener("click", (event) => {
    if (event.target === modal) {
        modal.style.display = "none";
    }
});
