document.addEventListener("DOMContentLoaded", () => {
    const switcher = document.getElementById("language-switcher");

    // NEW: Helper function to drill down into nested JSON keys (e.g., "admin.navhome")
    function getNestedTranslation(obj, path) {
        return path.split('.').reduce((currentObj, key) => {
            return currentObj && currentObj[key] !== undefined ? currentObj[key] : null;
        }, obj);
    }

    async function changeLanguage(lang) {
        try {
            const response = await fetch(`./${lang}.json`);
            if (!response.ok) throw new Error("Could not fetch translation file");
            const translations = await response.json();

            // 1. Translate regular text elements
            document.querySelectorAll("[data-i18n]").forEach(element => {
                const path = element.getAttribute("data-i18n");
                const translatedText = getNestedTranslation(translations, path); // Uses helper
                if (translatedText) {
                    element.innerText = translatedText;
                }
            });

            // 2. Translate placeholder text
            document.querySelectorAll("[data-i18n-placeholder]").forEach(element => {
                const path = element.getAttribute("data-i18n-placeholder");
                const translatedText = getNestedTranslation(translations, path); // Uses helper
                if (translatedText) {
                    element.setAttribute("placeholder", translatedText);
                }
            });

            // 3. Translate input values (Buttons)
            document.querySelectorAll("[data-i18n-value]").forEach(element => {
                const path = element.getAttribute("data-i18n-value");
                const translatedText = getNestedTranslation(translations, path); // Uses helper
                if (translatedText) {
                    element.value = translatedText;
                }
            });

            localStorage.setItem("preferred_lang", lang);

        } catch (error) {
            console.error("Error swapping languages:", error);
        }
    }

    switcher.addEventListener("change", (e) => {
        changeLanguage(e.target.value);
    });

    const savedLang = localStorage.getItem("preferred_lang") || "eng";
    switcher.value = savedLang;
    changeLanguage(savedLang);
});