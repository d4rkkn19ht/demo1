<?php 
        include_once 'config/configg.php';
        $product_id = $pro_id['id'];
        if (isset($_SESSION['id'])) { 
            $member_id = $_SESSION['id'];
            $product_id = $pro_id['id'];
            if(isset($_POST['rating'])){
                $rating = $_POST['rating'];
                $sql = "INSERT INTO tbl_rating(member_id,product_id,rating) VALUES($member_id,$product_id,$rating)";
                $query = mysqli_query($conn, $sql);
                $msg = "<div class='alert alert-success'>Cảm ơn bạn đã đánh giá sản phẩm</div>";
                //trung binh sao
            }
        }else{
            $msgg = "<div class='alert alert-danger'>Hãy đăng nhập để đánh giá sản phẩm</div>";
        }
        $sqls = "SELECT ROUND(AVG(rating),1) as averageRating FROM tbl_rating WHERE product_id = $product_id";
                $avgresult = mysqli_query($conn,$sqls);
                $fetchAverage = mysqli_fetch_array($avgresult);
                $averageRating = $fetchAverage['averageRating'];

?>

<div class="container">
    <div class="background" style="margin-top: 50px;">
        <section class="container pt-4">
            <div class="row">
                <?php if (isset($msg)) { echo $msg;} ?>
                <?php if (isset($msgg)) { echo $msgg;} ?>
                <div class="col-md-5 col-sm-5 col-lg-5 col-12">
                    <img style="height: 350px;" src="images/product/<?php echo $pro_id['img'];?>" alt="photo" id="change">
                    <div class="row mt-3">
                        <div class="col-sm-4 hidden-sm hidden-xs">
                            <img style="height: 100px;" src="images/product/<?php echo $pro_id['img'];?>" alt="photo" onclick="changeImg('one')" id="one">
                        </div>
                        <div class=" col-sm-4 hidden-sm hidden-xs">
                            <img style="height: 100px;" src="images/product/<?php echo $img2;?>" alt="photo" onclick="changeImg('two')" id="two">
                        </div>
                        <div class=" col-sm-4 hidden-sm hidden-xs">
                            <img style="height: 100px;" src="images/product/<?php echo $img3;?>" alt="photo" onclick="changeImg('three')" id="three">
                        </div>
                    </div>
                </div>

                <div class="col-md-7 col-sm-7 col-lg-7 col-12">
                    Lượt đánh giá:
                     <span style="color:#dca214;"><?php if($averageRating <= 0){
                         $averageRating = "Chưa có đánh giá.";
                     }echo $averageRating; ?></span>
                    <i class="fa fa-star" style="color:#2f9c5c"></i>
                    <h1 class=" mb-4" style="font-size: 25px;"><?php echo $pro_id['name']; ?></h1>

                    <p class="mr-2"> <?php echo $pro_id['description'] ?></p>
                    <br>
                    <div class="price ">
                        Giá: <?php echo number_format($pro_id['price']); ?> VNĐ
                    </div>
                    <div class="mt-5 mb-3" style="margin-top:20px;">
                        <button class="addcarts" value="<?php  echo $pro_id['id']; ?>">Add to cart</button>
                        <a><i class="fa fa-2x fa-heart" style="position: relative;padding-left: 30px;"><button style="position: absolute; opacity:0;right:5px;" class="addheart" value="<?php  echo $pro_id['id']; ?>"></button></i></a>
                    </div>
                    <br>
                    <form method="POST">
                       <div class="col-md-12">
                            <h2>Đánh giá sản phẩm</h2>
                            <div id="rateYo"></div>     
                        </div>
                        <input type="hidden" name="rating" id="rating">
                        <button class="btn btn-primary">Đánh giá</button>
                    </form>
                    <br>
                    <iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Fphp0620e-2.itpsoft.com.vn%2F&layout=button_count&size=small&appId=3569518036500896&width=77&height=20" width="77" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fphp0620e-2.itpsoft.com.vn%2F&width=90&layout=button_count&action=like&size=small&share=false&height=21&appId=3569518036500896" width="90" height="21" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </div>

        </section>
        <?php  
            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        ?>
         <div id="fb-root"></div>
            <div class="fb-comments" data-href="<?php echo $actual_link; ?>" data-numposts="5" data-width=""></div>
</div>
</div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v9.0&appId=3569518036500896&autoLogAppEvents=1" nonce="kOkXlJCU"></script>

    <script>
        function changeImg(id){
            let picture = document.getElementById(id).getAttribute('src');
            document.getElementById('change').setAttribute('src', picture);
        }

    </script>
    <script>
        $(function(){
            $("#rateYo").rateYo({
                fullStar:true,
                onSet: function(rating,rateYoInstance){
                $('#rating').val(rating);
                }  
            });
        });

    </script>

