import IMask from "imask";

document.addEventListener("DOMContentLoaded", () => {

    document.querySelectorAll('.phone-mask').forEach(input => {
        IMask(input, {
            mask: [
                { mask: '(00) 00000-0000' }
            ]
        });
    });

});
