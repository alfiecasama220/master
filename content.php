<section>
      <div class="container">
        <div class="section-title text-center mb-30">
          <div class="row">
            <div class="col-md-12">
              <h2>Select a Package</h2>
              <p>See what new available service</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <!-- Isotope Filter -->
            <!-- <div class="isotope-layout-filter filter-style-8 text-left cat-filter-default text-center" data-link-with="product-gallery-holder-1111">
              <a href="#" class="active" data-filter="*">All</a>
              <a href="#" class="" data-filter=".cat1">Cat1</a>
              <a href="#" class="" data-filter=".cat2">Cat2</a>
              <a href="#" class="" data-filter=".cat3">Cat3</a>
            </div> -->
            <!-- End Isotope Filter -->

            <!-- Isotope Gallery Grid -->
            <div id="product-gallery-holder-1111" class="isotope-layout grid-4 gutter-15 clearfix lightgallery-lightbox">
              <div class="isotope-layout-inner text-center">
                <?php 

                require_once("connection.php");
                
                  if(isset($_SESSION['logged']) == false) {
                    echo "<h6> Please login to proceed";
                  } else {
                    $database = "SELECT * FROM package";
                    $exe = mysqli_query($connection, $database);

                    while($rows = mysqli_fetch_assoc($exe)) {
                        $id = $rows['id'];
                        $image = $rows['Image'];
                        $title = $rows['Title'];
                        $category = $rows['Category'];
                        $description = $rows['Description'];
                        $price = $rows['Price'];
                        ?>

                        <div class="isotope-item cat1 cat3">
                            <div class="isotope-item-inner">
                            <div class="product">
                                <div class="product-header">
                                <div class="thumb image-swap">
                                    <a href="transaction.php?ID=<?php echo $id; ?>"><img src="schedules/<?php echo $image; ?>" class="product-main-image img-responsive img-fullwidth" width="300" height="300" alt="product"></a>
                                    <a href="transaction.php?ID=<?php echo $id; ?>"><img src="schedules/<?php echo $image; ?>" class="product-hover-image img-responsive img-fullwidth" alt="product"></a>
                                </div>
                                <div class="product-button-holder">
                                    <ul class="shop-icons">
                                    <li class="item"><a href="transaction.php?ID=<?php echo $id; ?>" class="button btn-quickview" title="Product quick view"></a></li>
                                    <li class="item"><a href="transaction.php?ID=<?php echo $id; ?>" class="button tm-btn-add-to-cart">Add to cart</a></li>
                                    </ul>
                                </div>
                                </div>
                                <div class="product-details">
                                <span class="product-categories"><a href="#" rel="tag"><?php echo $category ?></a></span>
                                <h5 class="product-title"><a href="shop-product-details.html"><?php echo $title; ?></a></h5>
                                <p><?php echo $description ?></p>
                                <span class="price">
                                    <ins><span class="amount"><span class="currency-symbol">₱</span><?php echo number_format($price); ?></span></ins>
                                </span>
                                </div>
                            </div>
                            </div>
                        </div>
                        <?php
                    }
                  }
                
                ?>
                <!-- Isotope Item Start -->
                
                <!-- Isotope Item End -->
                

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>