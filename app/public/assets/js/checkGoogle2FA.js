// const btnSubmit = document.getElementById("code-verify-btn");

// btnSubmit.addEventListener("click", (e) => {

//     //On empêche le submit
//     e.preventDefault();
//     //On récupère le code du formulaire
//     let code = document.querySelector("#form_code").value;
//     console.log("code = ", code);

//     //Vérifications d"usage
//     if (!code) {
//         alert("Merci de renseigner un code valide");
//         return false;
//     }
//     //On génère les données de formulaire
//     let formData = new FormData();
//     formData.append("code", code);

//     fetch("/google-authenticator", {
//         headers: {
//             "X-Requested-With": "XMLHttpRequest",
//         },
//         method: "POST",
//         body: formData,
//     })
//         .then((response) => response.json())
//         .then((data) => {
//             console.log("data = ", data);
//             if (!data.result) {
//                 alert("Code incorrect : " + data.code);
//                 return false;
//             }
//             alert("Code valide : " + data.code);
//         });
// });
