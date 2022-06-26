<div class="messages" style="<?=(isset($message)) ? 'display: block' : ''?>">
    <?php
    if(isset($message)){
            echo $message;
    }
    ?>
</div>

<div class="book-container">
    <section>
        <h2 class="section-heading">Borrow #<?= $borrow->getId() ?></h2>

    </section>

    <section>
        <h4>Book</h4>
        <ul>
            <li>Book Id: <?= $borrow->getBookId() ?></li>
            <li>Book Title: <?= $borrow->getBookTitle() ?></li>
            <li>Book Authors: <?= $borrow->getBookAuthors() ?></li>
        </ul>
    </section>

    <section>
        <h4>General</h4>
        <ul>
            <li>Lender: <?= $borrow->getLenderName() ?></li>
            <li>Borrower: <?= $borrow->getBorrowerName() ?></li>
            <li>Borrowed: <?= $borrow->getBorrowedOn() ?></li>
            <li>Return by: <?= $borrow->getReturnOn(); ?></li>
            <li>Returned: <?= $borrow->getReturnedOn() ? "Yes" : "No"; ?></li>
            <?php if ($borrow->getReturnedOn()) { ?>
            <li>Returned on: <?= $borrow->getReturnedOn(); ?></li>
            <?php } ?>
        </ul>
    </section>

    <?php if (in_array("borrows_create", $_SESSION['roles']) && !$borrow->getReturnedOn()) { ?>
        <a href="/" class="button positive" id="return-book">Return a book</a>
    <?php } ?>

</div>
