// assets/js/password-check.js
export default function initPasswordChecklist(fieldId) {
    const input = document.getElementById(fieldId);
    const bar = document.getElementById(`${fieldId}-bar`);
    const checklist = document.querySelectorAll(`#${fieldId}-checklist li`);

    if (!input) return;

    input.addEventListener("input", () => {
        const pw = input.value;
        const checks = {
            length: pw.length >= 10,
            upper: /[A-Z]/.test(pw),
            digit: /\d/.test(pw),
            special: /\W/.test(pw),
        };

        let passed = 0;
        checklist.forEach((li) => {
            const key = li.getAttribute("data-check");
            if (checks[key]) {
                li.textContent =
                    "✅ " + li.textContent.replace(/^❌ |^✅ /, "");
                passed++;
            } else {
                li.textContent =
                    "❌ " + li.textContent.replace(/^❌ |^✅ /, "");
            }
        });

        const percent = (passed / checklist.length) * 100;
        bar.style.width = percent + "%";
        bar.className =
            "h-2 rounded " +
            (percent < 40
                ? "bg-red-500"
                : percent < 80
                ? "bg-yellow-500"
                : "bg-green-500");
    });
}
