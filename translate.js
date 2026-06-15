document.addEventListener("DOMContentLoaded", () => {
    const switcher = document.getElementById("language-switcher");

    // 1. Function to fetch JSON and update UI text
    async function changeLanguage(lang) {
        try {
            const response = await fetch(`./${lang}.json`);
            if (!response.ok) throw new Error("Could not fetch translation file");
            const translations = await response.json();

            // Translate regular text elements (e.g., <a>, <h1>, <label>, <h3>)
            document.querySelectorAll("[data-i18n]").forEach(element => {
                const key = element.getAttribute("data-i18n");
                if (translations[key]) {
                    element.innerText = translations[key];
                }
            });

            // Translate placeholder text (e.g., input bars)
            document.querySelectorAll("[data-i18n-placeholder]").forEach(element => {
                const key = element.getAttribute("data-i18n-placeholder");
                if (translations[key]) {
                    element.setAttribute("placeholder", translations[key]);
                }
            });

            // Translate input values (e.g., <input type="button">)
            document.querySelectorAll("[data-i18n-value]").forEach(element => {
                const key = element.getAttribute("data-i18n-value");
                if (translations[key]) {
                    element.value = translations[key];
                }
            });

            // Save choice in localStorage so it remembers user selection on refresh
            localStorage.setItem("preferred_lang", lang);

        } catch (error) {
            console.error("Error swapping languages:", error);
        }
    }

    // 2. Event listener for dropdown switch
    switcher.addEventListener("change", (e) => {
        changeLanguage(e.target.value);
    });

    // 3. Load saved language preference on page initialization
    const savedLang = localStorage.getItem("preferred_lang") || "en";
    switcher.value = savedLang;
    changeLanguage(savedLang);
});