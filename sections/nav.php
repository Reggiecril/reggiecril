     <div class="nav-top" >
                    <div style="position: fixed;background-color:#263238 ;width: 100%;height: 80px;right: 0;z-index:1;">
                        <div id="mini" style="display: inline-block;"><img src="assets/images/mini.png" ></div>
                            <div class="page-title" style="display: inline-block;">
                                <h1>Whsii</h1>
                            </div>
                            <?php
                            if (!isset($_SESSION['email'])) {
                                print "
                                    <div class='nav-sign'>
                                        <div class='nav-sign-in'>
                                            <a href='web_dev.php?content=user/login.php' style='border-right: 3px solid;'><i class='fa fa-sign-in' aria-hidden='true' style='font-size:25px;'></i> <span style='margin-right:7px;'>Sign in</span></a>
                                        </div>
                                        <div class='nav-sign-up'>
                                            <a href='web_dev.php?content=user/sign-up.php'><i class='fa fa-pencil-square-o' aria-hidden='true' ></i><span>Sign up</span></a>
                                        </div>
                                        
                                    </div>
                                ";
                            }else{
                                print "
                                    <div class='nav-user'>
                                        <div class='menu_list'>
                                            <ul>
                                                <li class=''>
                                                    <p class='fuMenu'><i class='fa fa-user-circle' aria-hidden='true' style='font-size:30px; margin-right:20px;'></i><span>".$_SESSION['email']."</span></p>
                                                    <div class='div1'>
                                                        <p class='zcd' id='zcd1'><a href='web_dev.php?content=user/securePage.php' class='zcd' id='zcd1'><i class='fa fa-id-card' aria-hidden='true' style='margin-right:10px;'></i>View Profile</a></p>
                                                        <p class='zcd' id='zcd1'><a href='web_dev.php?content=user/logout.php' class='zcd' id='zcd1'><i class='fa fa-sign-out' aria-hidden='true' onclick='javascript:logoutFacebook();' style='margin-right:10px;'></i>Logout</a></p>
                                                    </div>
                                                </li>
                                            </ul>    
                                        </div>
                                    </div>
                                ";
                            }
                            
                            ?>
                </div>
    </div>
                           
    <div class="nav">

            <ul>
                <div id="mini" style="border-bottom:1px solid rgba(255,255,255,.1);"><img src="assets/images/mini.png" style="width: 100px;height: 77px; z-index: 0;"></div>
                <li class="nav-item">
                    <a href="web_dev.php"><i class="fa fa-home" aria-hidden="true" style="font-size: 20px;"></i>
                    <span>Home</span></a>
                </li>
                <li class="nav-item">
                    <a href="#"><i class="fa fa-spinner" aria-hidden="true" style="font-size: 20px;"></i><span>Test</span><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                    <ul>
                        <li><a href="web_dev.php?content=mainPage/initialtests.php"><span>Initial Test</span></a></li>
                        <li><a href="web_dev.php?content=mainPage/functiontest.php"><span>Function Test</span></a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#"><i class="fa fa-cart-plus" aria-hidden="true" style="font-size: 20px;"></i><span>Shopping</span><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                    <ul>
                        <li><a href="mainPage/convertPDF.php"><span>PDF</span></a></li>
                        <li><a href="web_dev.php?content=mainPage/OOTest.php"><span>OOT</span></a></li>
                        <li><a href="mainPage/Angular.html"><span>Angular JS</span></a></li>
                        <li><a href="web_dev.php?content=mainPage/testclasses.php"><span>OOTest</span></a></li>
                        <li><a href="web_dev.php?content=mainPage/PDO.php"><span>OOData</span></a></li>
                        <li><a href="web_dev.php?content=mainPage/display_xsl.php"><span>XML</span></a></li>
                        <li><a href="web_dev.php?content=mainPage/display_json.php"><span>Json</span></a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#"><i class="fa fa-envelope-o" aria-hidden="true" style="font-size: 20px;"></i><span>About us</span><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                    <ul>
                        <li><a href="web_dev.php?content=footer/about-us.php"><span>About</span></a></li>
                        <li><a href="web_dev.php?content=footer/contact.php"><span>Contact us</span></a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/welcome"><i class="fa fa-spinner" aria-hidden="true" style="font-size: 20px;"></i><span>Laravel</span></a>
                </li>
                
            </ul>
    </div>
