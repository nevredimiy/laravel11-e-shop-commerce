console.log("main js work");

// ----- vanilla javascript -----
// const dropBtn = document.querySelectorAll("[drop-btn]");
// console.log(dropBtn);
// dropBtn.forEach((item) => {
//   item.addEventListener("click", () => {
//     let value = item.ariaExpanded;
//     let dropMenu = item.nextElementSibling;
//     if (value == "true") {
//       item.ariaExpanded = "false";
//       dropMenu.classList.remove("active");
//     } else {
//       item.ariaExpanded = "true";
//       dropMenu.classList.add("active");
//     }
//   });
// });

//---- JQuery ----
//It says the same as above, but only in JQuery
$(document).ready(function () {
  $("[drop-btn]").on("click", function () {
    if (this.ariaExpanded == "true") {
      this.ariaExpanded = "false";
      this.nextElementSibling.classList.remove("active");
      this.children[0].classList.remove('rotate-180');
    } else {
      this.ariaExpanded = "true";
      this.nextElementSibling.classList.add("active");
      this.children[0].classList.add('rotate-180');
    }
  });

  $("[data-burger]").on("click", function () {
    $("[data-backdrop]").toggleClass("hidden");
    $("[data-mobile-menu]").toggleClass("-right-full");
    $("[data-mobile-menu]").toggleClass("right-0");
  });
  $("[data-close-mobile]").on("click", function () {
    $("[data-backdrop]").toggleClass("hidden");
    $("[data-mobile-menu]").toggleClass("-right-full");
    $("[data-mobile-menu]").toggleClass("right-0");
  });
});
