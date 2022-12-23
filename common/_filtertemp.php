
<form action="/action_page.php">
    <!--
    Every select element (6 of them) should have its own id for the
                script that does resizing to fit to content won't work-->

    <select class="filters-row resizing-select" name="cars" id="<?php echo $_SESSION['filterID']?>">;
        <option value="" disabled selected hidden>Genre</option>
        <option value="superhero">Format</option>
        <option value="detective">Price</option>
        <option value="action">Author</option>
        <option value="scifi">Publisher</option>
    </select> 
</form>