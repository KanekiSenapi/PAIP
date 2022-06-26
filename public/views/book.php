<div class="messages" style="<?= (isset($message)) ? 'display: block' : '' ?>">
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
</div>

<div class="book-container" key="<?= $book->getId(); ?>">

    <section>
        <h2 class="section-heading"><?= $book->getTitle() ?></h2>
        <div class="section-subheading"><?= $book->getAuthors() ?></div>

    </section>

    <section>
        <h4>General</h4>
        <ul>
            <li>Publisher: <?= $book->getPublisher() ?></li>
            <li>Category: <?= $book->getType() ?></li>
            <li>Year of publishing: <?= $book->getPublishedYear() ?></li>
        </ul>
    </section>

    <section>
        <h4>Description</h4>

        <p><?= $book->getDescription() ?></p>
    </section>

    <section>
        <h4>Details</h4>
        <ul>
            <li>Number of pages: <?= $book->getPagesNumber() ?></li>
            <li>ISBN: <?= $book->getIsbn() ?></li>
        </ul>
    </section>

    <?php if (in_array("books_delete", $_SESSION['roles'])) { ?>
    <section>
        <h4>History</h4>
        <div class="table-container">
            <table>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Borrower</th>
                    <th>Borrowed</th>
                    <th>Returned</th>

                </tr>
                </thead>
                <tbody id="history-body">
                </tbody>
            </table>
        </div>
    </section>
    <?php } ?>

    <?php if (in_array("borrows_view", $_SESSION['roles'])) { ?>
        <a href="/" class="button negative" id="delete-book">Delete a book</a>
    <?php } ?>

</div>
