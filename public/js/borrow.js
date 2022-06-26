const returnBookButton = document.querySelector("#return-book");


function handleReturnButton(e) {
    e.stopPropagation()
    e.preventDefault()
    let url = window.location.href;

    fetch(url,
        {method: "PATCH"})
        .then(response => {
                if (response.status === 200) {
                    window.location.href = "/borrows/";
                } else {
                    window.location.href += "?message=Something went wrong. Try again."
                }
            }
        )
        .catch(err => {
            window.location.href += "?message=Something went wrong. Try again.";
            console.log(err);
        });
}

if (returnBookButton) {
    returnBookButton.addEventListener("click", handleReturnButton)
}
