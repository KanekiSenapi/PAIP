<div>
    <h2>Create a book metadata</h2>
    <form class="form register" action="borrows" method="POST">
        <div class="messages" style="<?=(isset($message)) ? 'display: block' : ''?>">
            <?php
            if(isset($message)) {
                    echo $message;
            }
            ?>
        </div>
        <label for="borrower-label">Borrower</label>
        <select name="borrowerId" id="borrower-label" required>
        </select>

        <label for="book-label">Book</label>
        <select name="bookId" id="book-label">
        </select>

        <input name="lenderId" type="hidden" value="<?= $_SESSION['uid']?>">

        <button type="submit">Borrow</button>
    </form>
</div>
