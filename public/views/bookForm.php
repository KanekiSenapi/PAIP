<div>
    <h2>Add a book</h2>
    <form class="form register" action="books" method="POST">
        <div class="messages" style="<?=(isset($message)) ? 'display: block' : ''?>">
            <?php
            if(isset($message)){
                    echo $message;
            }
            ?>
        </div>
        <label for="metadata-label">Books metadata</label>
        <select name="metadataId" id="metadata-label" required>
        </select>


        <button type="submit">Add</button>
    </form>
</div>
