const deleteBtns = document.querySelectorAll(".deleteBtn");
const modal = document.querySelector(".modal-overlay");
const cancelBtn = document.querySelector(".cancel-btn");

const deleteButtons = document.querySelectorAll(".deleteBtn");
const deleteInput = document.getElementById("deleteId");

deleteBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    const employeeId = btn.dataset.id;
    deleteInput.value = employeeId;
    modal.style.display = "flex";
  });
});

cancelBtn.addEventListener("click", () => {
  modal.style.display = "none";
});

deleteButtons.forEach((button) => {
  button.addEventListener("click", () => {
    const id = button.dataset.id;
    deleteInput.value = id;

    document.getElementById("modal").style.display = "block";
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const messageBanner = document.querySelector(".message-banner");
  const closeBtn = document.querySelector(".close");

  if (messageBanner && closeBtn) {
    closeBtn.addEventListener("click", () => {
      messageBanner.style.display = "none";
      console.log("close");
    });
  }
});
