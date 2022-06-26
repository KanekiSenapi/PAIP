<?php if (in_array("books_create", $_SESSION['roles'])) { ?>
    <a href="/metadataForm" class="button positive">Add metadata</a>
    <a href="/bookForm" class="button positive">Add book</a>
<?php } ?>

<div class="search">
    <input name="query" id="search-label" type="text" placeholder="Search" required>
</div>
<div class="table-container">
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Authors</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
