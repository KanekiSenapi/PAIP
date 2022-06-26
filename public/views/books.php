<?php if (in_array("books_create", $_SESSION['roles'])) { ?>
    <a href="/metadataForm" class="button positive">Add metadata</a>
    <a href="/bookForm" class="button positive">Add book</a>
<?php } ?>
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
        <?php foreach ($books as $book): ?>
            <tr key="<?= $book->getId(); ?>" class="book-row">
                <td><?= $book->getId(); ?></td>
                <td><?= $book->getTitle(); ?></td>
                <td><?= $book->getAuthors(); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
