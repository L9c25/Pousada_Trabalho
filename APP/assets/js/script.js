const navBar = document.querySelector(".header-mobile"),
       menuBtns = document.querySelectorAll(".menu-icon"),
       overlay = document.querySelector(".overlay-header");
       itens = document.querySelectorAll(".nav-link");



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