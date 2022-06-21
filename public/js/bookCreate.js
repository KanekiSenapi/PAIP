function fetchAuthors() {
    fetch("/authors")
        .then(response => response.json())
        .then(response => {
                console.log(response);
            }
        ).catch(err => console.log(err));
}

window.addEventListener("load", () => {
    fetchAuthors();
})