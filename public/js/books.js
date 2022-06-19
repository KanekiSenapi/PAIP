const bookRows = document.querySelectorAll(".book-row");


function handleBookRowClick(e) {
    e.stopPropagation()
    let bookId = e.target.parentElement.getAttribute("key")
    window.location.href = '/book/' + bookId
    console.log(window.location.href)
}


bookRows.forEach(bookRow => bookRow.addEventListener("click", handleBookRowClick))


