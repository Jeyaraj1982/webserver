<?php include_once("header.php");?>
    <?php 
         $Packages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and md5(PackageID)='".$_GET['tid']."'");
         $SubTours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and SubTourTypeID='".$Packages[0]['SubTourTypeID']."'");
         $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1' and TourTypeID='".$SubTours[0]['TourTypeID']."'");
   ?>
    <main class="main">        
        <div class="wrap">
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="index.php" title="Home">Home</a></li>
                    <li><a title="Travel guides"><?php echo $Tours[0]['TourTypeName'];?></a></li>
                    <li><a title="Travel guides"><?php echo $SubTours[0]['SubTourTypeName'];?></a></li>                                       
                    <li><a title="Travel guides"><?php echo $Packages[0]['PackageName'];?></a></li>                                       
                </ul>
            </nav>
            <div class="row">
                <section class="full-width">
                    <h1><?php echo $Packages[0]['PackageName'];?></h1>
                    <nav class="inner-nav">
                        <ul>
                            <li><a href="#general_info" title="General information">General information</a></li>
                            <li><a href="#sports_and_nature" title="Sports and nature">Sports and nature</a></li>
                            <li><a href="#nightlife" title="Nightlife">Nightlife</a></li>
                            <li><a href="#culture" title="Culture and history">Culture and history</a></li>
                            <li><a href="#hotels" title="Hotels">Hotels</a></li>
                            <li><a href="#flights" title="Flights">Flights</a></li>
                        </ul>
                    </nav>
                    <section id="general_info" class="tab-content">
                        <article>                                                                      
                            <h2><?php echo $Packages[0]['PackageName'];?></h2>
                            <figure><img src="uploads/package/<?php echo $Packages[0]['Image1'];?>" /></figure>
                            <p><?php echo $Packages[0]['Description'];?></p>
                        
                            <table>
                                <tr>
                                    <th>Sovereign state</th>                                  
                                    <td>United Kingdom</td>
                                </tr>
                                <tr>
                                    <th>Country</th>
                                    <td>England</td>
                                </tr>
                                
                                <tr>
                                    <th>Languages spoken</th>
                                    <td><?php echo $Packages[0]['SpokenLanguage'];?></td>
                                </tr>
                                <tr>
                                    <th>Currency</th>
                                    <td><?php echo $Packages[0]['Currency'];?></td>
                                </tr>
                                <tr>
                                    <th>Visa requirements</th>
                                    <td><?php echo $Packages[0]['VisaRequirements'];?></td>
                                </tr>
                                <tr>
                                    <th>Meal Type</th>
                                    <td><?php echo $Packages[0]['MealsType'];?></td>
                                </tr>
                                <tr>
                                    <th>Special Type</th>
                                    <td><?php echo $Packages[0]['SpecialMeal'];?></td>                  
                                </tr>
                                <tr>
                                    <th>Toppings</th>
                                    <td><?php echo $Packages[0]['Toppings'];?></td>
                                </tr>
                                <tr>                                                                           
                                    <th>Bus Available</th>
                                    <td><?php echo $Packages[0]['BusAvailable'];?></td>
                                </tr>
                                <tr>
                                    <th>Airline Available</th>
                                    <td><?php echo $Packages[0]['AirlineAvailable'];?></td>
                                </tr>
                            </table>
                        </article>
                    </section>
                    <section id="sports_and_nature" class="tab-content">
                        <article>
                            <h2>Sports and nature</h2>
                            <figure><img src="images/uploads/london2.jpg" alt="Things to do - London Sports and nature" /></figure>
                            <p><strong>London is one of the greenest capitals in the world, with plenty of green and open spaces. There are more than 3000 open spaces.</strong></p>
                            <p>Lorem ipsum dolor sit amet,  adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Ut wisi enim ad minim veniam, quis nostrud exerci. </p>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                        </article>
                    </section>
                    <section id="nightlife" class="tab-content">
                        <article>
                            <h2>Nightlife</h2>
                            <figure><img src="images/uploads/london3.jpg" alt="Things to do - London Nightlife" /></figure>
                            <p><strong>Looking for nightclubs in London? Take a look at our guide to London clubs. Browse for club ideas, regular club nights and one-off events. </strong></p>
                            <p>Lorem ipsum dolor sit amet,  adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Ut wisi enim ad minim veniam, quis nostrud exerci. </p>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                        </article>
                    </section>
                    <section id="culture" class="tab-content">
                        <article>
                            <h2>Culture and history</h2>
                            <figure><img src="images/uploads/london4.jpg" alt="Things to do - London general" /></figure>
                            <p><strong>For a display of British pomp and ceremony, watch the Changing the Guard ceremony outside Buckingham Palace.</strong></p>
                            <p>Lorem ipsum dolor sit amet,  adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Ut wisi enim ad minim veniam, quis nostrud exerci. </p>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                        </article>
                    </section>
                    <section id="hotels" class="tab-content">
                        <div class="deals row">
                            <!--deal-->
                            <article class="full-width">
                                <figure><a href="hotel.html" title=""><img src="images/uploads/hotel1.jpg" alt="" /></a></figure>
                                <div class="details">
                                    <h3>Best ipsum hotel 
                                        <span class="stars">
                                            <i class="material-icons">&#xE838;</i>
                                            <i class="material-icons">&#xE838;</i>
                                            <i class="material-icons">&#xE838;</i>
                                            <i class="material-icons">&#xE838;</i>
                                        </span>
                                    </h3>
                                    <span class="address">London  •  <a href="#">Show on map</a></span>
                                    <span class="rating"> 8 /10</span>
                                    <span class="price">Price per room per night from  <em>$ 50</em> </span>
                                    <div class="description">
                                        <p>Overlooking the Aqueduct and Nature Park, hotel is situated 5 minutes’ walk from London’s Zoological Gardens and a metro station. <a href="hotel.html">More info</a></p>
                                    </div>
                                    <a href="hotel.html" title="Book now" class="gradient-button">Book now</a>
                                </div>
                            </article>
                            <!--//deal-->
                            
                            <!--deal-->
                            <article class="full-width">
                                <figure><a href="hotel.html" title=""><img src="images/uploads/hotel2.jpg" alt="" /></a></figure>
                                <div class="details">
                                    <h3>Tropicana hotel
                                        <span class="stars">
                                            <i class="material-icons">&#xE838;</i>
                                            <i class="material-icons">&#xE838;</i>
                                            <i class="material-icons">&#xE838;</i>
                                            <i class="material-icons">&#xE838;</i>
                                            <i class="material-icons">&#xE838;</i>
                                        </span>
                                    </h3>
                                    <span class="address">London  •  <a href="#">Show on map</a></span>
                                    <span class="rating"> 9 /10</span>
                                    <span class="price">Price per room per night from  <em>$ 80</em> </span>
                                    <div class="description">
                                        <p>Overlooking the Aqueduct and Nature Park, hotel is situated 5 minutes’ walk from London’s Zoological Gardens and a metro station. <a href="hotel.html">More info</a></p>
                                    </div>
                                    <a href="hotel.html" title="Book now" class="gradient-button">Book now</a>
                                </div>
                            </article>
                            <!--//deal-->
                            
                            <!--deal-->
                            <article class="full-width">
                                <figure><a href="hotel.html" title=""><img src="images/uploads/hotel3.jpg" alt="" /></a></figure>
                                <div class="details">
                                    <h3>Spa Resort hotel
                                        <span class="stars">
                                            <i class="material-icons">&#xE838;</i>
                                            <i class="material-icons">&#xE838;</i>
                                            <i class="material-icons">&#xE838;</i>
                                            <i class="material-icons">&#xE838;</i>
                                        </span>
                                    </h3>
                                    <span class="address">London  •  <a href="#">Show on map</a></span>
                                    <span class="rating"> 8 /10</span>
                                    <span class="price">Price per room per night from  <em>$ 70</em> </span>
                                    <div class="description">
                                        <p>Overlooking the Aqueduct and Nature Park, hotel is situated 5 minutes’ walk from London’s Zoological Gardens and a metro station. <a href="hotel.html">More info</a></p>
                                    </div>
                                    <a href="hotel.html" title="Book now" class="gradient-button">Book now</a>
                                </div>
                            </article>
                            <!--//deal-->
                            
                            <!--deal-->
                            <article class="full-width">
                                <figure><a href="hotel.html" title=""><img src="images/uploads/hotel4.jpg" alt="" /></a></figure>
                                <div class="details">
                                    <h3>Best ipsum hotel 
                                        <span class="stars">
                                            <i class="material-icons">&#xE838;</i>
                                            <i class="material-icons">&#xE838;</i>
                                            <i class="material-icons">&#xE838;</i>
                                            <i class="material-icons">&#xE838;</i>
                                        </span>
                                    </h3>
                                    <span class="address">London  •  <a href="#">Show on map</a></span>
                                    <span class="rating"> 8 /10</span>
                                    <span class="price">Price per room per night from  <em>$ 50</em> </span>
                                    <div class="description">
                                        <p>Overlooking the Aqueduct and Nature Park, hotel is situated 5 minutes’ walk from London’s Zoological Gardens and a metro station. <a href="hotel.html">More info</a></p>
                                    </div>
                                    <a href="hotel.html" title="Book now" class="gradient-button">Book now</a>
                                </div>
                            </article>
                            <!--//deal-->
                            
                            <!--deal-->
                            <article class="full-width">
                                <figure><a href="hotel.html" title=""><img src="images/uploads/hotel5.jpg" alt="" /></a></figure>
                                <div class="details">
                                    <h3>Tropicana hotel
                                        <span class="stars">
                                            <i class="material-icons">&#xE838;</i>
                                            <i class="material-icons">&#xE838;</i>
                                            <i class="material-icons">&#xE838;</i>
                                            <i class="material-icons">&#xE838;</i>
                                            <i class="material-icons">&#xE838;</i>
                                        </span>
                                    </h3>
                                    <span class="address">London  •  <a href="#">Show on map</a></span>
                                    <span class="rating"> 9 /10</span>
                                    <span class="price">Price per room per night from  <em>$ 80</em> </span>
                                    <div class="description">
                                        <p>Overlooking the Aqueduct and Nature Park, hotel is situated 5 minutes’ walk from London’s Zoological Gardens and a metro station. <a href="hotel.html">More info</a></p>
                                    </div>
                                    <a href="hotel.html" title="Book now" class="gradient-button">Book now</a>
                                </div>
                            </article>
                            <!--//deal-->
                            
                            <!--deal-->
                            <article class="full-width">
                                <figure><a href="hotel.html" title=""><img src="images/uploads/hotel6.jpg" alt="" /></a></figure>
                                <div class="details">
                                    <h3>Spa Resort hotel
                                        <span class="stars">
                                            <i class="material-icons">&#xE838;</i>
                                            <i class="material-icons">&#xE838;</i>
                                            <i class="material-icons">&#xE838;</i>
                                            <i class="material-icons">&#xE838;</i>
                                        </span>
                                    </h3>
                                    <span class="address">London  •  <a href="#">Show on map</a></span>
                                    <span class="rating"> 8 /10</span>
                                    <span class="price">Price per room per night from  <em>$ 70</em> </span>
                                    <div class="description">
                                        <p>Overlooking the Aqueduct and Nature Park, hotel is situated 5 minutes’ walk from London’s Zoological Gardens and a metro station. <a href="hotel.html">More info</a></p>
                                    </div>
                                    <a href="hotel.html" title="Book now" class="gradient-button">Book now</a>
                                </div>
                            </article>
                            <!--//deal-->
                            
                            <!--bottom navigation-->
                            <div class="bottom-nav full-width">
                                <!--back up button-->
                                <a href="#" class="scroll-to-top" title="Back up">Back up</a> 
                                <!--//back up button-->
                                
                                <!--pager-->
                                <div class="pager">
                                    <span><a href="#">First page</a></span>
                                    <span><a href="#">&lt;</a></span>
                                    <span class="current">1</span>
                                    <span><a href="#">2</a></span>
                                    <span><a href="#">3</a></span>
                                    <span><a href="#">4</a></span>
                                    <span><a href="#">5</a></span>
                                    <span><a href="#">&gt;</a></span>
                                    <span><a href="#">Last page</a></span>
                                </div>
                                <!--//pager-->
                            </div>
                            <!--//bottom navigation-->
                        </div>
                    </section>
                    <section id="flights" class="tab-content">
                        <div class="deals row">
                            <!--deal-->
                            <article class="full-width">
                                <figure><a href="#" title=""><img src="images/uploads/london1.jpg" alt="" /></a></figure>
                                <div class="details">
                                    <h3>London Flights</h3>
                                    <span class="price">Price per person from<em>$ 50</em> </span>
                                    <div class="description">
                                        <p>Every Monday, Wednesday and Saturday <a href="hotel.html">More info</a></p>
                                    </div>
                                    <a href="hotel.html" title="Book now" class="gradient-button">Book now</a>
                                </div>
                            </article>
                            <!--//deal-->
                            
                            <!--deal-->
                            <article class="full-width">
                                <figure><a href="#" title=""><img src="images/uploads/venice.jpg" alt="" /></a></figure>
                                <div class="details">
                                    <h3>Venice Flights</h3>
                                    <span class="price">Price per person from<em>$ 50</em> </span>
                                    <div class="description">
                                        <p>Every Monday, Wednesday and Saturday <a href="hotel.html">More info</a></p>
                                    </div>
                                    <a href="hotel.html" title="Book now" class="gradient-button">Book now</a>
                                </div>
                            </article>
                            <!--//deal-->
                            
                            <!--deal-->
                            <article class="full-width">
                                <figure><a href="#" title=""><img src="images/uploads/amsterdam.jpg" alt="" /></a></figure>
                                <div class="details">
                                    <h3>Amsterdam Flights</h3>
                                    <span class="price">Price per person from  <em>$ 50</em> </span>
                                    <div class="description">
                                        <p>Every Monday, Wednesday and Saturday <a href="hotel.html">More info</a></p>
                                    </div>
                                    <a href="hotel.html" title="Book now" class="gradient-button">Book now</a>
                                </div>
                            </article>
                            <!--//deal-->

                            <!--deal-->
                            <article class="full-width">
                                <figure><a href="#" title=""><img src="images/uploads/saint-petersburg.jpg" alt="" /></a></figure>
                                <div class="details">
                                    <h3>St Petersburg Flights</h3>
                                    <span class="price">Price per person from  <em>$ 50</em> </span>
                                    <div class="description">
                                        <p>Every Monday, Wednesday and Saturday <a href="hotel.html">More info</a></p>
                                    </div>
                                    <a href="hotel.html" title="Book now" class="gradient-button">Book now</a>
                                </div>
                            </article>
                            <!--//deal-->
                            
                            <!--deal-->
                            <article class="full-width">
                                <figure><a href="#" title=""><img src="images/uploads/paris.jpg" alt="" /></a></figure>
                                <div class="details">
                                    <h3>Paris Flights</h3>
                                    <span class="price">Price per person from  <em>$ 50</em> </span>
                                    <div class="description">
                                        <p>Every Monday, Wednesday and Saturday <a href="hotel.html">More info</a></p>
                                    </div>
                                    <a href="hotel.html" title="Book now" class="gradient-button">Book now</a>
                                </div>
                            </article>
                            <!--//deal-->
                            
                            <!--deal-->
                            <article class="full-width">
                                <figure><a href="#" title=""><img src="images/uploads/saint-petersburg.jpg" alt="" /></a></figure>
                                <div class="details">
                                    <h3>St Petersburg Flights</h3>
                                    <span class="price">Price per person from  <em>$ 50</em> </span>
                                    <div class="description">
                                        <p>Every Monday, Wednesday and Saturday <a href="hotel.html">More info</a></p>
                                    </div>
                                    <a href="hotel.html" title="Book now" class="gradient-button">Book now</a>
                                </div>
                            </article>
                            <!--//deal-->
                            
                            <!--deal-->
                            <article class="full-width">
                                <figure><a href="#" title=""><img src="images/uploads/venice.jpg" alt="" /></a></figure>
                                <div class="details">
                                    <h3>Venice Flights</h3>
                                    <span class="price">Price per person from  <em>$ 50</em> </span>
                                    <div class="description">
                                        <p>Every Monday, Wednesday and Saturday <a href="hotel.html">More info</a></p>
                                    </div>
                                    <a href="hotel.html" title="Book now" class="gradient-button">Book now</a>
                                </div>
                            </article>
                            <!--//deal-->
                            
                            <!--deal-->
                            <article class="full-width">
                                <figure><a href="#" title=""><img src="images/uploads/amsterdam.jpg" alt="" /></a></figure>
                                <div class="details">
                                    <h3>Amsterdam Flights</h3>
                                    <span class="price">Price per person from  <em>$ 50</em> </span>
                                    <div class="description">
                                        <p>Every Monday, Wednesday and Saturday <a href="hotel.html">More info</a></p>
                                    </div>
                                    <a href="hotel.html" title="Book now" class="gradient-button">Book now</a>
                                </div>
                            </article>
                            <!--//deal-->
                            
                            <!--bottom navigation-->
                            <div class="bottom-nav full-width">
                                <!--back up button-->
                                <a href="#" class="scroll-to-top" title="Back up">Back up</a> 
                                <!--//back up button-->
                                
                                <!--pager-->
                                <div class="pager">
                                    <span><a href="#">First page</a></span>
                                    <span><a href="#">&lt;</a></span>
                                    <span class="current">1</span>
                                    <span><a href="#">2</a></span>
                                    <span><a href="#">3</a></span>
                                    <span><a href="#">4</a></span>
                                    <span><a href="#">5</a></span>
                                    <span><a href="#">&gt;</a></span>
                                    <span><a href="#">Last page</a></span>
                                </div>
                                <!--//pager-->
                            </div>
                            <!--//bottom navigation-->
                        </div>
                    </section>
                    
                </section>
            </div>
        </div>
    </main>
    <?php include_once("footer.php");?>