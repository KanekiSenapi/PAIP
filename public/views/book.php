<div class="book-container">

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

        <p>
            <?= $book->getDescription() ?>
        </p>
    </section>

    <section>
        <h4>Details</h4>
        <ul>
            <li>Number of pages: <?= $book->getPagesNumber() ?></li>
            <li>ISBN: <?= $book->getIsbn() ?></li>
        </ul>
    </section>


</div>
