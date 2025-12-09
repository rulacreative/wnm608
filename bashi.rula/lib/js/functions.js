// GLOBAL UTILITIES 

const qs = (sel, parent=document) => parent.querySelector(sel);
const qsa = (sel, parent=document) => [...parent.querySelectorAll(sel)];

const templater = f => a => a.map(f).join("");


/* --- parallax on iPhone by syncing hero image to scroll --- */
document.addEventListener("DOMContentLoaded", () => {
    const hero = document.querySelector(".view-window");

    // If no hero image exists, stop.
    if (!hero) return;

    const img = hero.style.backgroundImage;
    document.body.classList.add("parallax-active");
    document.body.style.backgroundImage = img;

    // Disable background on hero itself for mobile
    hero.style.backgroundImage = "none";
});
