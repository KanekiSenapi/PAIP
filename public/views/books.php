<div class="table-conteiner">
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
