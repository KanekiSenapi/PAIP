window.addEventListener("load", () => {
    fetchUsers();
    fetchBooks();
})

function fetchUsers() {
    fetchGetAll("/usersList", "borrower-label", "id", "fullname")
}

function fetchBooks() {
    fetchGetAll("/booksFree", "book-label", "id", "name")
}



function fetchGetAll(endpoint, selectId, idFieldName, contextFieldName) {
    fetch(endpoint)
        .then(response => response.json())
        .then(response => {
                const select = document.getElementById(selectId);
                response.forEach(publisher => {
                    const option = document.createElement('option');
                    option.value = publisher[idFieldName];
                    option.innerHTML = publisher[contextFieldName];
                    select.appendChild(option);
                });
            }
        ).catch(err => console.log(err));
}