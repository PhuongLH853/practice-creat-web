<!DOCTYPE html>
<html>
<head>
    <title>PRACTICE HTML CSS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./fonts/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./img">
    <link rel="shortcut icon" type="image/png" href="./img/header_img.png"/>
</head>

<body>
    <header class ="header">
        <!--Begin left-->
        <div>
            <h1 class="logo">
                <p><b>DVD RENTAL</b></p>
            </h1>
            <label><i>THẾ GIỚI ĐIỆN ẢNH TRONG TẦM TAY</i></label>
        </div>
        <!--End left-->
        <!--Begin right-->
        <img class="header_img" src="./img/header_img.png">
        <!--End right-->
    </header>
    <main>
        <!--search area-->
        <div class="search_area">
            <input class="search_box" type="text" placeholder ="Search...">
            <button type="submit">
                <i class="search_icon ti-search"></i>
            </button>
        </div>
        <!--end search area-->

        <!--Begin list top film block-->
        <div class="div1">
        <h3 class="title1"><b>PHIM ĐỀ CỬ</b></h3>
            <div class="list_top_film">
                <div class="main">
                    <img  class="main_image" src="./img/film (6).jpg">
                    <div class="control prev">
                        <i class="ti-arrow-circle-left"></i>
                    </div>   
                    <div class="control next">
                        <i class="ti-arrow-circle-right"></i>
                    </div>   
                </div>
                <div class="list_image">
                    <div class="active"><img src="./img/film (10).jpg"></div>
                    <div><img src="./img/film (6).jpg"></div>
                    <div><img src="./img/film (3).jpg"></div>
                    <div><img src="./img/film (4).jpg"></div>
                    <div><img src="./img/film (14).jpg"></div>
                    <div><img src="./img/film (12).jpg"></div>
                    <div><img src="./img/film (13).jpg"></div>
                    <div><img src="./img/film (8).jpg"></div>
                    <div><img src="./img/film (9).jpg"></div>
                    <div><img src="./img/film (1).jpg"></div>
                </div>
            </div>
        </div>
        <!--End list top film block-->

        <!--Begin list top actor block-->
        <div class="div2">
        <h3 class="title2">DIỄN VIÊN TRIỂN VỌNG</h3>
        <!-- Vùng chứa slideshow -->
        <div class="list_top_actor">
            <!-- Hình ảnh trình diễn slideshow -->
            <div class = "act_img">
                <div class="slide">
                    <img src="./img/actor (2).jpg" />
                </div>
                <div class="slide">
                    <img src="./img/actor (1).jpg" />
                </div>
                <div class="slide">
                    <img src="./img/actor (3).jpg" />
                </div>
                <div class="slide">
                    <img src="./img/actor (4).jpg" />
                </div>
             </div>
    
            <!-- Dấu chấm hình tròn -->
            <div class="dot" align = center>
                <span class="dotlist" onclick="currentSlide(0)"></span>
                <span class="dotlist" onclick="currentSlide(1)"></span>
                <span class="dotlist" onclick="currentSlide(2)"></span>
                <span class="dotlist" onclick="currentSlide(3)"></span>
            </div>
        </div>    
        </div>
        <!--End list top actor block-->
    
        <!--Begin new rental block-->    
        <div class="div3">
        <h3 class = "title3">LƯỢT THUÊ MỚI NHẤT</h3>
        <div class = "rental_rank">
        <?php
            // Thông tin kết nối đến cơ sở dữ liệu PostgreSQL
            $host = "localhost";
            $port = "5432";
            $dbname = "DB_training";
            $user = "postgres";
            $password = "Lehaphuong@123";

            // Kết nối đến cơ sở dữ liệu
            try {
                $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
            } catch (PDOException $e) {
                die("Kết nối thất bại: " . $e->getMessage());
            }

            // Truy vấn dữ liệu từ bảng
            $sql = "SELECT film.title
            FROM (film INNER JOIN inventory ON film.film_id = inventory.film_id) 
            INNER JOIN rental ON inventory.inventory_id = rental.inventory_id
            ORDER BY rental.rental_date DESC
            LIMIT 10";
            $result = $conn->query($sql);

            // Hiển thị danh sách cơ sở dữ liệu trong HTML
            if ($result->rowCount() > 0) {
                echo "<ul class = 'rental_rank_list'>";
                foreach ($result as $row) {
                    $title = $row["title"];
                    $url = "./dummy.html";

                    echo "<li class = 'item'><a href='$url'>$title</a></li>";
                }
                echo "</ul>";
            } else {
                echo "NO DATA";
            }

            // Đóng kết nối
            $conn = null;
            ?>
        </div>
        </div>
        <!--End new rental block-->  
    </main>   
    <!--Begin footer-->
    <footer class="footer">
            <img class="footer_img" src="./img/footer_image.png">
    </footer> 
    <!--End footer-->
    <script type="text/javascript" src="./js/main.js"></script>
</body>
</html>