const searchInput = document.querySelector("#search");
const searchResult = document.querySelector(".table-results");

let dataArray;

async function getUsers(){
    const res = await fetch("https://randomuser.me/api/?nat=fr&results=10")

    const { results } = await res.json()

    dataArray = orderList(results)
    createUserList(dataArray)
}

getUsers()

function orderList(data) {

    const orderedData = data.sort((a,b) => {
        if(a.name.last.toLowerCase() < b.name.last.toLowerCase()) {
            return -1;
        }
        if(a.name.last.toLowerCase() > b.name.last.toLowerCase()) {
            return 1;
        }
        return 0;
    })

    return orderedData;
}

function createUserList(usersList) {

    usersList.forEach(user => {
        const listItem = document.createElement("div");
        listItem.setAttribute("class", "table-item");

        listItem.innerHTML = 
        ` 
        <p class="name">${user.name.last} ${user.name.first}</p>
        <p class="email"> ${user.email}</p>
        <p class="phone"> ${user.phone}</p>
        `

        searchResult.appendChild(listItem);
    });
}

searchInput.addEventListener("input", filterData)

function filterData(e) {
    searchResult.innerHTML = ""

    const searchStr = e.target.value.toLowerCase().replace(/\s/g, "");

    const filteredArr = dataArray.filter(el => el.name.first.toLowerCase().includes(searchStr) ||el.name.last.toLowerCase().includes(searchStr) || el.phone.toLowerCase().includes(searchStr))

    createUserList(filteredArr)
}