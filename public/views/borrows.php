<?php if (in_array("books_create", $_SESSION['roles'])) { ?>
    <a href="/borrowForm" class="button positive">Borrow</a>
<?php } ?>
<div class="table-container">
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Book Id</th>
            <th>Book Title</th>
            <th>Book Authors</th>
            <th>Borrower</th>
            <th>Returned</th>
            <th>Expired</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($borrows as $borrow): ?>
            <tr key="<?= $borrow->getId(); ?>" class="borrow-row <?= $borrow->getExpired() ? 'borrow-row-expired' : '' ?>">
                <td><?= $borrow->getId(); ?></td>
                <td><?= $borrow->getBookId(); ?></td>
                <td><?= $borrow->getBookTitle(); ?></td>
                <td><?= $borrow->getBookAuthors(); ?></td>
                <td><?= $borrow->getBorrowerName(); ?></td>
                <td><?= $borrow->getReturned() ? "YES" : "NO"; ?></td>
                <td><?= $borrow->getExpired() ? "YES" : "NO"; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
