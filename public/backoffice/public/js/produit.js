// bouton pour toutes les div
let btnProduit = document.querySelector("#produitToggle");
let btnIngredient = document.querySelector("#ingredientToggle");
let btnCategorie = document.querySelector("#categorieToggle");
let btnTva = document.querySelector("#tvaToggle");
let btnPromo = document.querySelector("#promoToggle");


// Produits
let tableProduit = document.querySelector("#tableProduit");
let tableStyleProduit = document.querySelector("#tableStyleProduit");

// Ingredient 
let tableIngredient = document.querySelector("#tableIngredient");
let tableStyleIngredient = document.querySelector("#tableStyleIngredient");

// Categorie 
let tableCategorie = document.querySelector("#tableCategorie");
let tableStyleCategorie = document.querySelector("#tableStyleCategorie");

// Tva 
let tableTva = document.querySelector("#tableTva");
let tableStyleTva = document.querySelector("#tableStyleTva");

// Promo 
let tablePromo = document.querySelector("#tablePromo");
let tableStylePromo = document.querySelector("#tableStylePromo");


// Ferme et ouvre la div Produit
btnProduit.addEventListener("click", () => {
  if(getComputedStyle(tableProduit).display != "none") {
    tableProduit.style.display = "none";
    tableStyleProduit.style.display = "none";
  } else {
    tableProduit.style.display = "";
    tableStyleProduit.style.display = "";
  }
})

// Ferme et ouvre la div Ingrédient
btnIngredient.addEventListener("click", () => {
  if(getComputedStyle(tableIngredient).display != "none") {
    tableIngredient.style.display = "none";
    tableStyleIngredient.style.display = "none";
  } else {
    tableIngredient.style.display = "";
    tableStyleIngredient.style.display = "";
  }
})

// Ferme et ouvre la div Categorie
btnCategorie.addEventListener("click", () => {
  if(getComputedStyle(tableCategorie).display != "none") {
    tableCategorie.style.display = "none";
    tableStyleCategorie.style.display = "none";
  } else {
    tableCategorie.style.display = "";
    tableStyleCategorie.style.display = "";
  }
})

// Ferme et ouvre la div Tva
btnTva.addEventListener("click", () => {
  if(getComputedStyle(tableTva).display != "none") {
    tableTva.style.display = "none";
    tableStyleTva.style.display = "none";
  } else {
    tableTva.style.display = "";
    tableStyleTva.style.display = "";
  }
})

// Ferme et ouvre la div Tva
btnPromo.addEventListener("click", () => {
  if(getComputedStyle(tablePromo).display != "none") {
    tablePromo.style.display = "none";
    tableStylePromo.style.display = "none";
  } else {
    tablePromo.style.display = "";
    tableStylePromo.style.display = "";
  }
})


