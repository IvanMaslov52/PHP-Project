const avatarUpload = document.getElementById("avatar-upload");
const avatarImg = document.querySelector(".avatar img");

avatarUpload.addEventListener("change", function () {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.addEventListener("load", function () {
            avatarImg.src = reader.result;
        });
        reader.readAsDataURL(file);
    }
});