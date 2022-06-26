const container = document.querySelector("tbody");
const searchInput = document.querySelector("#search-label");
let timeout = null;

window.addEventListener("load", () => {
    fetchBooks();
    searchInput.addEventListener("input", searchDelay);
})


function fetchBooks() {
    let query = searchInput.value;
    fetchGetAll("/books?query=" + query);
}

function searchDelay() {
    if (timeout) {
        clearTimeout(timeout);
    }
    timeout = setTimeout(function() {
        fetchBooks();
    }, 450);
}

function handleBookRowClick(e) {
    e.stopPropagation()
    let bookId = e.target.parentElement.getAttribute("key")
    window.location.href = "/booksView/" + bookId
}

function fetchGetAll(endpoint) {
    console.log("Fethcing for endpoint: " + endpoint);
    fetch(endpoint)
        .then(response => response.json())
        .then(response => {
            console.log(response);
                container.innerHTML = '';
                if (response.length === 0) {
                    const td = document.createElement('td');
                    td.setAttribute("colspan", "4");
                    td.innerHTML = "No elements."
                    container.appendChild(td);
                }
                response.forEach(row => {
                    const tr = document.createElement('tr')
                    tr.setAttribute("key", row['id']);
                    tr.addEventListener("click", handleBookRowClick)
                    tr.appendChild(prepareTd(row, 'id'));
                    tr.appendChild(prepareTd(row, 'title'));
                    tr.appendChild(prepareTd(row, 'authors'));
                    container.appendChild(tr);
                });

            }
        ).catch(err => console.log(err));
}

function prepareTd(obj, fieldName, mapper = x => x) {
    const td = document.createElement('td');
    td.innerHTML = mapper(obj[fieldName]);
    return td;
}

