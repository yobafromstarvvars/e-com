
<form>
    <!--
    Every select element (5 of them) should have its own id for the
                script that does resizing to fit to content won't work-->

    <select class="filters-row resizing-select" name="cars" id="<?php echo $_SESSION['filterID']?>">;
        <option value="" disabled hidden selected ><?php echo ucwords($_SESSION['filterID']);?></option>
        <option value="superhero">Element 1</option>
        <option value="detective">Element 2</option>
        <option value="action">Element 3</option>
        
    </select> 
</form>