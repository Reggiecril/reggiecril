
<?php 
    require './config/init.php';
    require './sections/head.php';
    require './sections/load_xml.php';
    require './sections/save-json.php';
?>


<body>
    
    <?php
        require "./sections/nav.php";
    ?>

    <div class="content">

        <div class="content-content">
            <?php
            	if(isset($_GET['content'])){
            		require ''.$_GET['content'];
            	}else{
            		echo '<div style="text-align:center;">
                    <h1 >Index Page : Main Content</h1>
                    <p>This will hold the main content of the index pages</p>
                    </div>
                    ';
                    require "image.html";
            	}

            ?>
        </div>

    </div>
</body>    


</html>