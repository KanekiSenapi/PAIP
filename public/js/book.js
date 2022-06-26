const deleteBookButton = document.querySelector("#delete-book");

const bookContainer = document.querySelector(".book-container");
const historyContainer = document.querySelector("#history-body");

function handleDeleteButton(e) {
    e.stopPropagation()
    e.preventDefault()
    let url = window.location.href;

    fetch(url,
        {method: "DELETE"})
        .then(response => {
                if (response.status === 200) {
                    window.location.href = "/booksView/";
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

function fetchBorrowHistory() {
    let bookId = bookContainer.getAttribute("key");
    fetchGetAll("/borrowHistory/" + bookId)
}

function fetchGetAll(endpoint) {
    fetch(endpoint)
        .then(response => response.json())
        .then(response => {
                response.forEach(row => {
                    const tr = document.createElement('tr')
                    tr.addEventListener("click", () => window.location.href = "/borrows/" + row['id'])
                    tr.appendChild(prepareTd(row, 'id'));
                    tr.appendChild(prepareTd(row, 'borrowerName'));
                    tr.appendChild(prepareTd(row, 'borrowedon'));
                    tr.appendChild(prepareTd(row, 'returned', r => r ? "Yes" : "No"));
                    historyContainer.appendChild(tr);
                });
                if (response.length === 0) {
                    const td = document.createElement('td');
                    td.setAttribute("colspan", "4");
                    td.innerHTML = "No history yet."
                    historyContainer.appendChild(td);
                }
            }
        ).catch(err => console.log(err));
}

function prepareTd(obj, fieldName, mapper = x=>x) {
    const td = document.createElement('td');
    td.innerHTML = mapper(obj[fieldName]);
    return td;
}

window.addEventListener("load", () => {
    fetchBorrowHistory();
})

deleteBookButton.addEventListener("click", handleDeleteButton)
