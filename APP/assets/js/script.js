const navBar = document.querySelector(".header-mobile"),
       menuBtns = document.querySelectorAll(".menu-icon"),
       overlay = document.querySelector(".overlay-header");
       itens = document.querySelectorAll(".nav-link");

       function toggleForm() {
        var formularioOverlay = document.getElementById("formulario-overlay");
        var formularioContainer = document.getElementById("formulario-container");
        formularioOverlay.style.display = "block";
        formularioContainer.style.display = "block";
    }

    function fecharFormulario() {
        var formularioOverlay = document.getElementById("formulario-overlay");
        var formularioContainer = document.getElementById("formulario-container");
        formularioOverlay.style.display = "none";
        formularioContainer.style.display = "none";
    }

     menuBtns.forEach((menuBtn) => {
       menuBtn.addEventListener("click", () => {
         navBar.classList.toggle("open");
       });
     });
     overlay.addEventListener("click", () => {
       navBar.classList.remove("open");
     });
     itens.forEach((itens) =>
     itens.addEventListener("click", (event) => {
        navBar.classList.remove("open");
      })
      );