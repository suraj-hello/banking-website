
const navtoggler = document.getElementsByClassName("toggler")[0];
const navlist = document.getElementsByClassName("nav_list")[0];
const other = document.getElementsByClassName("nav_list")[0];


navtoggler.addEventListener("click",()=> {
  navlist.classList.toggle("active");
});

other.addEventListener("click",()=> {
    navlist.classList.toggle("active");
});

 