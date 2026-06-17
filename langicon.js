document.addEventListener("DOMContentLoaded", () => 
{
    const switcher = document.getElementById("language-switcher");
    const langimg = document.getElementById("langimg");
    


    switcher.addEventListener("change", (e) => {
        langimg.src = `${e.target.value}.png`;
        localStorage.setItem("preferred_img", e.target.value);
    });

    const savedimg = localStorage.getItem("preferred_img") || "eng";
    switcher.value = savedimg;
    langimg.src = `${savedimg}.png`;

});