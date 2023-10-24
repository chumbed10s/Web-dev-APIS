/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

document.addEventListener("DOMContentLoaded", () => {
    const thememode = document.getElementById("thememode");

    const stylesheet = document.getElementById("stylesheet");

    let getting = window.matchMedia("(prefers-color-scheme: dark)");
    let isdark = getting.matches;


    


    function setdark() {
        if (isdark) {
            console.log("darkmode activado");
            stylesheet.href = "../../assets/css/darkmode.css";
            localStorage.setItem("darkmode", "enabled");
            isdark = true;
        } else {
            console.log("darkmode desactivado");
            stylesheet.href = "../../assets/css/estilos.css";
            localStorage.setItem("darkmode", "disabled");
            isdark = false;
        }
    }

    if (isdark){
        setdark();
    }

    thememode.addEventListener("change", (e) => {
        optionselected = thememode.value;
        
        if (optionselected === "enabled" || optionselected === "disabled") {
            isdark = optionselected === "enabled";
        } else {
            isdark = getting.matches;
        }

        setdark()}
        
        );

    getting.addEventListener("change", (e) => {

        optionselected = thememode.value;
        
        if (optionselected === "enabled" || optionselected === "disabled") {
            return;
        } 

        isdark = e.matches;
        setdark();
    });
});



