

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<?php require_once 'layout/header.php'; ?>
<?php require_once 'layout/menu1.php'; ?>


<main>
  <!-- About Us Section -->
  <section class="about-us py-5 bg-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5">
          <img src="anhTui.jpg" class="img-fluid rounded mb-4 mb-lg-0" alt="about thumb">
        </div>
        <div class="col-lg-7">
          <h2 class="about-title mb-3">Giới thiệu</h2>
          <h5 class="about-sub-title text-muted mb-4">Được thành lập ngày 25/10/2024</h5>
          <p class="text-justify">
          Túi không chỉ là vật dụng mang tính tiện ích mà còn là
           phụ kiện thời trang giúp thể hiện phong cách và cá tính của mỗi người.
            Từ những chiếc túi xách sang trọng, túi đeo chéo năng động, đến túi tote thân thiện môi trường, mỗi loại túi đều có thiết kế và công năng riêng biệt phù hợp với từng hoàn cảnh.
          </p>
          <p class="text-justify">
          Dù bạn là người yêu thích phong cách tối giản, cá tính, hay thanh lịch, luôn có một chiếc túi phù hợp để đồng hành trong mọi khoảnh khắc.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Team Section -->
  <section class="team-area py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="title">Thành viên</h2>
      </div>
      <div class="row">
        <!-- Team Member 1 -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card border-0 shadow">
            <img src="Son.jpg" class="card-img-top" alt="Vương Hoàng Sơn">
            <div class="card-body text-center">
              <h5 class="card-title">Vương Hoàng Sơn</h5>
              <p class="card-text text-muted">CEO</p>
              <div class="d-flex justify-content-center">
                <a href="#" class="mx-2"><i class="fa fa-facebook"></i></a>
                <a href="#" class="mx-2"><i class="fa fa-twitter"></i></a>
                <a href="#" class="mx-2"><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
        <!-- Team Member 2 -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card border-0 shadow">
            <img src="Tung.jpg" class="card-img-top" alt="Đặng Xuân Tùng">
            <div class="card-body text-center">
              <h5 class="card-title">Đặng Xuân Tùng</h5>
              <p class="card-text text-muted">Designer</p>
              <div class="d-flex justify-content-center">
                <a href="#" class="mx-2"><i class="fa fa-facebook"></i></a>
                <a href="#" class="mx-2"><i class="fa fa-twitter"></i></a>
                <a href="#" class="mx-2"><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
        <!-- Team Member 3 -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card border-0 shadow">
            <img src="Duong.jpg" class="card-img-top" alt="Phạm Tuấn Dương">
            <div class="card-body text-center">
              <h5 class="card-title">Phạm Tuấn Dương</h5>
              <p class="card-text text-muted">Developer</p>
              <div class="d-flex justify-content-center">
                <a href="#" class="mx-2"><i class="fa fa-facebook"></i></a>
                <a href="#" class="mx-2"><i class="fa fa-twitter"></i></a>
                <a href="#" class="mx-2"><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<style>
  .card-img-top {
    width: 100%;
    height: 500px;
    object-fit: cover;
  }
</style>
<?php require_once 'layout/miniCart.php'; ?>
<?php require_once 'layout/footer.php'; ?>




