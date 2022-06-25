window.addEventListener("load", () => {
    fetchAuthors();
    fetchTypes();
    fetchPublishers();
})

function fetchAuthors() {
    fetchGetAll("/authors", "authors-label", "id", "fullname")
}

function fetchTypes() {
    fetchGetAll("/types", "types-label", "id", "name")
}

function fetchPublishers() {
    fetchGetAll("/publishers", "publishers-label", "id", "name")
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