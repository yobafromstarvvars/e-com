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
  display: block;
  background-color:transparent;
  border:none;
}



.sidenav a:hover, button:hover {
  color: #f1f1f1;
}

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
  <form action="admin.php" method="post">
    <a href="<?=$gotoAdmin?>">Admin panel</a>
    <a href="<?=$gotoHome?>">Main page</a>
    <hr>
    <button name="table" value="orders">Orders</button>
    <button name="table" value="user">Users</button>
    <button name="table" value="product">Products</button>
    <button name="table" value="category">Categories</button>
    <button name="table" value="subcategory">Subcategories</button>
    <button name="table" value="type">Types</button>
    <button name="table" value="brand">Brands</button>
  </form>
</div>