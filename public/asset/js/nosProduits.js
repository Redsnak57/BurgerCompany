// // Filtre les catégories 
// let list = document.querySelectorAll(".produits__item");
// let itemBox = document.querySelectorAll(".nosProduits");

// for (let i=0; i<list.length; i++) {
//     list[i].addEventListener("click", function (){
//         for(let j = 0; j<list.length; j++){
//             list[j].classList.remove("active");
//         }
//         this.classList.add("active");

//         let dataFilter = this.getAttribute("data-filter");

//         for (let k = 0; k<itemBox.length; k++){
//             itemBox[k].classList.remove("active");
//             itemBox[k].classList.add("hide");

//             if(itemBox[k].getAttribute("data-item") == dataFilter || dataFilter == "all"){
//                 itemBox[k].classList.remove("hide");
//                 itemBox[k].classList.add("active");
//             }
//         }
//     })
// }


// modal produits 
let popupsBtn = document.querySelectorAll("[data-popup-ref]");

popupsBtn.forEach(btn => {
    btn.addEventListener("click", activePopUp);

    function activePopUp() {
        let popupID = btn.getAttribute("data-popup-ref");
        let popup = document.querySelector(`[data-popup-id='${popupID}']`);

        if(popup != undefined && popup != null){
            let popupContent = document.querySelector(".popupContent");
            let closeBtns = popup.querySelectorAll("[data-dismiss-popup]");

            // ajoute la classe active
            popup.classList.add("active");
            // Ajoute 1ms après la classe active, pour avoir une transition via le css
            setTimeout(()=> {
                popupContent.classList.add("active");
            }, 1);

            
            closeBtns.forEach(btn => { btn.addEventListener("click", onPopUpClose); });
            // Si clic ailleurs de la popup ferme celui ci
            popup.addEventListener("click", onPopUpClose);
            // Si clic dans la popupContent alors ça ne se ferme pas
            popupContent.addEventListener("click", (ev) => {
                ev.stopPropagation();
            });


            // Ferme le popup
            function onPopUpClose(){
                setTimeout(()=> {
                    popup.classList.remove("active");
                }, 250);
                popupContent.classList.remove("active");
            }
        } 
    }
})
