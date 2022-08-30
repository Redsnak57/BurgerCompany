// bouton pour toutes les div
let btnProduit = document.querySelector("#produitToggle");
let btnIngredient = document.querySelector("#ingredientToggle");
let btnCategorie = document.querySelector("#categorieToggle");


// Produits
let tableProduit = document.querySelector("#tableProduit");
let tableStyleProduit = document.querySelector("#tableStyleProduit");

// Ingredient 
let tableIngredient = document.querySelector("#tableIngredient");
let tableStyleIngredient = document.querySelector("#tableStyleIngredient");

// Categorie 
let tableCategorie = document.querySelector("#tableCategorie");
let tableStyleCategorie = document.querySelector("#tableStyleCategorie");


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


