        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#" style="color:white"> S-LINKS</a>
                </li>
                <li>
                    <a href="../index.php">Dashboard</a>
                </li>

                <?php 

if(isset($_SESSION["superadmin"])){

                ?>

                 <li>
                    <a href="">Admin</a>
                </li>
                    <li>
                    <a href="../admin/index.php">&nbsp;&nbsp;&nbsp;&nbsp; List of users</a>
                </li>
                <li>
                    <a href="../admin/create_users.php">&nbsp;&nbsp;&nbsp;&nbsp; Create a user</a>
                </li>
           


                <?php
}

                ?>


                                <li>
                    <a href="#">App Users</a>
                </li>
        
                
                <li>
                    <a href="#">Categories</a>
                </li>
                <li>
                    <a href="#">&nbsp;&nbsp;&nbsp;&nbsp; Create a category</a>
                </li>
                
                 <li>
                    <a href="subcategories/index.php">Subcategories</a>
                </li>
                <li>
                    <a href="subcategories/create_subcat.php">&nbsp;&nbsp;&nbsp;&nbsp; Create a category</a>
                </li>



                <li>
                    <a href="#">Merchants</a>
                </li>
 
                <li>
                    <a href="#">&nbsp;&nbsp;&nbsp;&nbsp; Add a Merchant</a>
                </li>
                
                  <li>
                    <a href="../disconnect.php">Disconnect</a>
                </li>

            </ul>
        </div>
        <!-- /#sidebar-wrapper -->