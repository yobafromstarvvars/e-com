<form class="path-row" action="<?php echo ROOTURL."/common/_path.php"?>" method="post">
    <?php 
        $i = 0;
        $history_length = count($_SESSION["history"]);
        
        foreach($_SESSION["history"] as $history_name => $history_url) {
            if ($i == $history_length-1) break;
            $item_name = ucfirst($history_name);
            echo "<button type='submit' name='redirect_url' value='{$history_url}' class='path-middle-btn'>{$item_name}</button>";
            $i++;
        }
    ?>
        
    <button class="path-end-btn"><?= ucfirst(array_key_last($_SESSION["history"])) ?></button>

</form>

