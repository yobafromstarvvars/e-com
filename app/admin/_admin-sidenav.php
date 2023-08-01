<style>
#main{
    margin:0;
    padding:0;
}

body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a, button {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: flex;
  background-color:transparent;
  border:none;
  justify-content: start;
  align-items: center;
}

.sidenav *:hover{
  color: #f1f1f1;
}

/* .sidenav span {
  color: #818181;
} */

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>

<!-- Side nav -->
<div class="sidenav">
  <form action="admin.php" method="get">
    <a href="<?=$gotoHome?>">
      Music House
    </a>
    <a href="<?=$gotoAdmin?>">Admin panel</a>
    <hr>
    <?php
      foreach ($tables as $table => $records) {
          echo "<a href='#{$table}'>" . ucfirst(strtolower($table)) . " (" . count($records) . ")" . "</a>";
      }
    ?>
  </form>
</div>