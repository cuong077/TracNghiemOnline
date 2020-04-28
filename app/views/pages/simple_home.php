<!-- Slider With Banner Area start Here -->
		<div class="slider-with-banner">
            <div class="container">
                <div class="row">
                    <!-- Begin Slider Area -->
                    <div class="col-lg-12 col-md-12">
                        <div class="slider-area pt-sm-30 pt-xs-30">
                            <div class="slider-active owl-carousel">
                                <!-- Begin Single Slide Area -->
                                <div class="single-slide align-center-left animation-style-01 bg-1">
                                    <div class="slider-progress"></div>
                                </div>
                                <!-- Single Slide Area End Here -->
                                <!-- Begin Single Slide Area -->
                                <div class="single-slide align-center-left animation-style-02 bg-2">
                                    <div class="slider-progress"></div>
                                </div>
                                <!-- Single Slide Area End Here -->
                            </div>
                        </div>
                    </div>
                    <!-- Slider Area End Here -->
                </div>
            </div>
        </div>
<!-- Slider With Banner Area End Here -->

<!-- product-area start -->
        <div class="product-area pt-55 pb-25 pt-xs-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="li-product-tab">
                            <ul class="nav li-product-menu">
                                <li><a class="active" data-toggle="tab" href="#li-new-product"><span>Sản phẩm mới</span></a></li>
                            </ul>
                        </div>
                        <!-- Begin Li's Tab Menu Content Area -->
                    </div>
                </div>
                <div class="tab-content">
                    <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                        <div class="row">
                            <div class="product-active owl-carousel">
                                <?php 

                                    if(isset($data["products"])){
                                        while ($product = mysqli_fetch_array($data["products"])){

                                        
                                ?>
                                        <div class="col-lg-12">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="Product/Detail/<?php echo $product["id"]; ?>">
                                                        <img src="<?php echo explode('|', $product["images"])[0]; ?>" alt="Li's Product Image">
                                                    </a>
                                                    <span class="sticker">Mới</span>
                                                </div>
                                                <div class="product_desc">
                                                    <div class="product_desc_info">
                                                        <div class="product-review">
                                                            <h5 class="manufacturer">
                                                           
                                                                <a href="Home/showCategory/<?php echo $product['category_id']; ?>" value=""><?php echo $product['category_name']; ?></a>
                                                            
                                                            </h5>
                                                       
                                                            <div class="rating-box">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <h4><a class="product_name" href="Product/Detail/<?php echo $product["id"]; ?>"><?php echo $product["name"]; ?></a></h4>
                                                        <div class="price-box">
                                                            <span class="new-price"><?php echo $product["price"]; ?> VNĐ</span>
                                                        </div>
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul class="add-actions-link" style="text-align: center;">
                                                            <input type="hidden" name="product-name" value="<?php echo $product['name']; ?>">
                                                            <input type="hidden" name="product-image" value="<?php echo explode('|', $product["images"])[0]; ?>">

                                                            <input type="hidden" name="product-price" value="<?php echo $product['price']; ?>">

                                                            <input type="hidden" name="product-id" value="<?php echo $product['id']; ?>">

                                                            <input type="hidden" name="product-quantity" value="1">

                                                            <li class="add-cart active" onclick="addToCart(event, this);"><a id="add-to-cart" href="" >Thêm vào giỏ</a></li>
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>

                                <?php 
                                        }
                                    }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product-area end -->