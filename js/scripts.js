const deleteBtns = document.querySelectorAll(".deleteBtn");
const modal = document.querySelector(".modal-overlay");
const cancelBtn = document.querySelector(".cancel-btn");
const deleteInput = document.querySelector("#deleteId");

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
