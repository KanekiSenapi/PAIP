const bookRows = document.querySelectorAll(".book-row");


function handleBookRowClick(e) {
    e.stopPropagation()
    let bookId = e.target.parentElement.getAttribute("key")
    window.location.href ="/books/" + bookId
}


bookRows.forEach(bookRow => bookRow.addEventListener("click", handleBookRowClick))


