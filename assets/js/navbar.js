const navItems = document.querySelectorAll(".container__nav-items a");

navItems.forEach((item) => {
    item.addEventListener("click", function (e) {
        const sectionId = this.getAttribute("data-section");
        if (sectionId) {
            localStorage.setItem("activeSection", sectionId);
        }
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const activeSectionId = localStorage.getItem("activeSection");

    if (activeSectionId) {
        const activeSection = document.getElementById(activeSectionId);
        if (activeSection) {
            activeSection.style.backgroundColor = "lightblue";
            activeSection.style.color = "#fff";
        }
    }
});
