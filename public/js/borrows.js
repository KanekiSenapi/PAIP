const borrowRows = document.querySelectorAll(".borrow-row");


function handleBookRowClick(e) {
    e.stopPropagation()
    let id = e.target.parentElement.getAttribute("key")
    window.location.href ="/borrows/" + id
}


borrowRows.forEach(borrowRow => borrowRow.addEventListener("click", handleBookRowClick))


