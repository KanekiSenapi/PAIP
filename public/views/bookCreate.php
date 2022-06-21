<div class="login-container">
    <h2>Create a book</h2>
    <form class="form register" action="bookCreate" method="POST">
        <div class="messages" style="<?=(isset($messages)) ? 'display: block' : ''?>">
            <?php
            if(isset($messages)){
                foreach($messages as $message) {
                    echo $message;
                }
            }
            ?>
        </div>
        <label for="authors-label">Authors</label>
        <select name="authorsIds" id="authors-label" multiple required>
        </select>

        <label for="publishers-label">Publisher</label>
        <select name="publisherId" id="publishers-label">
        </select>

        <label for="types-label">Category</label>
        <select name="typeId" id="types-label">
        </select>

        <label for="isbn-label">ISBN</label>
        <input name="isbn" id="isbn-label" type="text"
               placeholder="(only numbers)"
               minlength="13"
               maxlength="13"
               pattern="\d*"
               aria-errormessage="dd"
               required
        >

        <label for="title-label">Title</label>
        <input name="title" id="title-label" type="text" placeholder="Title" required>

        <label for="pagesNumber-label">Number of pages</label>
        <input name="pagesNumber" id="pagesNumber-label" type="number" placeholder="100" min="1" required>

        <label for="publishmentYear-label">Year of publishing</label>
        <input name="publishmentYear" id="publishmentYear-label" type="number" placeholder="2020" min="0" required>

        <label for="description-label">Description</label>
        <textarea name="description" id="description-label" minlength="32" required></textarea>

        <button type="submit">Add</button>
    </form>
</div>
