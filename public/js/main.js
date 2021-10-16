'use strict';
let url= location.href;
let links = document.querySelectorAll('.nav-link');

links.forEach(link =>{
    let anchor_link = link.href;
    // add active to anchotr tag dynamically
    url === anchor_link?link.classList.add('active'):link.classList.remove('active')
  
})
