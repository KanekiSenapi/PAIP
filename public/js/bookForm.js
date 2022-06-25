window.addEventListener("load", () => {
    fetchMetadata();
})

function fetchMetadata() {
    fetchGetAll("/metadata", "metadata-label", "id", "title")
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