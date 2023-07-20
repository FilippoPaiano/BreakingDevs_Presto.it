const categoriesWrapper=document.querySelector('#categoriesWrapper');
const categoriesList=document.querySelector('#categoriesList');
const close=document.querySelector('#close');


categoriesWrapper.addEventListener('click',()=>{
    categoriesList.classList.add('d-block', 'links')
    categoriesList.classList.remove('d-none')
})

close.addEventListener('click', ()=>{
    categoriesList.classList.remove('d-block', 'links')
    categoriesList.classList.add('d-none')
})