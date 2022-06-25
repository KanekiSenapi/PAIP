const deleteBookButton = document.querySelector("#delete-book");


function handleDeleteButton(e) {
    e.stopPropagation()
    e.preventDefault()
    let url = window.location.href;

    fetch(url,
        {method: "DELETE"})
        .then(response => {
               if (response.status === 200) {
                   window.location.href ="/books/";
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


deleteBookButton.addEventListener("click", handleDeleteButton)


