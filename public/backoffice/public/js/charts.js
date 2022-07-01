var clients = document.getElementById("chartClients").getContext("2d");
var chart = new Chart(clients, {
    type: "line",
    data : {
        labels: ["Jan", "Fev", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Sept", "Oct", "Nov", "Dec"],
        datasets: [
            {
                label: "Panier moyen",
                backgroundColor: "#fff",
                borderColor: "#4f48ec",
                data : [50,30,20,60,35,55,90,80,100,50,70,90],
            }
        ]
    }
});

var recette = document.getElementById("chartRecette").getContext("2d");
var chart = new Chart(recette, {
    type: "line",
    data : {
        labels: ["Jan", "Fev", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Sept", "Oct", "Nov", "Dec"],
        datasets: [
            {
                label : "Recette",
                backgroundColor: "#fff",
                borderColor: "#38d6eb",
                data : [1800,3200,2140,4100,3255,4155,7930,2810,1790,7410,6350,8500],
            }
        ]
    }
});
