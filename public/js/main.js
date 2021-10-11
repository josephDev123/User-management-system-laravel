'use strict';
let links = document.querySelectorAll('.nav-link');
links.forEach(link =>{
    link.onclick =(e)=>{ 
        link.classList.add('active')
    }
})
