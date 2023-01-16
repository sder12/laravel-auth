import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

//Delete btn
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

//Preview
const coverImageInput = document.getElementById("cover_img"); //input img
const imagePreview = document.getElementById("image_preview"); //preview img

if (coverImageInput && imagePreview) {
    // console.log('change', this.files[0]);
    coverImageInput.addEventListener('change', function () {
        const uploadedFile = this.files[0];
        if (uploadedFile) { //if there is the file insert in src the path
            const reader = new FileReader();
            reader.addEventListener('load', function () {
                imagePreview.src = reader.result;
            });
            reader.readAsDataURL(uploadedFile);
        }
    });
}
