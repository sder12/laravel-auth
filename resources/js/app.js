import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


const deleteBtns = document.querySelectorAll(".delete-btn");

deleteBtns.forEach((btn) => {
    btn.addEventListener("click", (event) => {
        event.preventDefault();
        const projectTitle = btn.getAttribute("data-project-title");
        const modal = new bootstrap.Modal(
            document.getElementById("deleteModal")
        );
        document.getElementById("modal-project-title").innerText = projectTitle;
        document.getElementById("delete").addEventListener("click", () => {
            btn.parentElement.submit();
        });
        modal.show();
    });
});