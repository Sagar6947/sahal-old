<header id="kamkaaj-header" class="kamkaaj-header-two">
            <!-- TopStrip -->
            <div class="kamkaaj-top-strip">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p><i class="far fa-envelope-open"></i> <a href="#">info@jobpartner.in</a></p>
                            <p><i class="fa fa-phone"></i> 7419 561 JOB</p>
                            <ul class="kamkaaj-stripuser">
                                <?php
                                if(isset($_SESSION['jp_status']) == 'Active')
                                {
                                    echo '<li><a href="../jp-profile.php"><i class="icon-flat kamkaaj-user-plus"></i> My Profile</a></li>
                                    <li><a href="../jp_applied.php" ><i class="icon-flat kamkaaj-user-plus"></i> Applied Job</a></li>
                                    <li><a href="../jp_referal.php" ><i class="icon-flat kamkaaj-user-plus"></i> Reference History</a></li>
                                     
                                    <li><a href="../jp_logout.php" ><i class="icon-flat kamkaaj-multimedia"></i> Logout    </a></li>';
                                }
                                else
                                {   echo '<li><a href="#" data-toggle="modal" data-target="#twoeModal"><i class="icon-flat kamkaaj-user-plus"></i> Login</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#threeModal"><i class="icon-flat kamkaaj-multimedia"></i> Signup</a></li>';
                                   
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- TopStrip -->

            <!-- MainHeader -->
            <div class="kamkaaj-header-main">
                <span class="kamkaaj-header-transparent"></span>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="../index.php" class="kamkaaj-logo"><img src="../images/kamkaaj-logo-dark.png" width="200px" alt="Job Partner - Your Government Job Partner"></a>
                            <div class="kamkaaj-right-head">
                                <span class="kamkaaj-menu-link">
                                    <span class="menu-bar"></span>
                                    <span class="menu-bar"></span>
                                    <span class="menu-bar"></span>
                                </span>
                                <nav id="main-nav">
                                    <ul id="main-menu" class="sm sm-blue">
                                        <li><a href="../index.php">Home</a></li>
                                         
                                        <li><a href="../admit-card.php">Admit Card</a></li>
                                        <li><a href="../answer-key.php">Answer Key</a></li>
                                        <li><a href="../result.php">Result</a></li>
                                        <li><a href="../syllabus.php">Syllabus</a></li>
                                        
                                    </ul>
                                </nav>
                                <a href="../../latest-jobs.php" class="kamkaaj-header-btn">Government Jobs</a>
                                 <a href="../../admission-with-jobpartner.php" class="kamkaaj-header-btn">Admission Forms</a>
                                 <!-- <nav id="main-nav">
                                    <ul id="main-menu" class="sm sm-blue">
                                        <li><a href="../index.php">Home</a></li>
                                        <li><a href="../latest-jobs.php">Available jobs</a></li>
                                        <li><a href="../admission-with-jobpartner.php">Admission Forms</a></li>
                                        <li><a href="../contact-us.php">Contact us</a></li>
                                    </ul>
                                </nav>
                                <a href="../latest-jobs.php" class="kamkaaj-header-btn">Government Jobs</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MainHeader -->

        </header>
        <div style="text-align: center;padding:10px;background:red;color:white;font-weight:bold;">
            <?php
            if(isset($c_message))
            {
                echo $c_message;
            }
            ?>
        </div>