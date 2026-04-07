<?php
include './db.connection/db_connection.php'; // Include your database connection file

// Retrieve service filter from GET request
$service = isset($_GET['service']) ? $_GET['service'] : '';

// --- SQL QUERY UPDATED TO INCLUDE english_heading ---
$sql = "SELECT id, slug, title, english_heading, main_content, main_image, created_at FROM blogs";
if (!empty($service)) {
  $sql .= " WHERE service = ?";
}
$sql .= " ORDER BY created_at DESC";

// Initialize statement
$stmt = $conn->prepare($sql);

// Bind parameters if service is set
if (!empty($service)) {
  $stmt->bind_param("s", $service);
}

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();
?>


<?php include 'navbar.php'; ?>


<main>


  <div class="container blog-sidebar-list" style="padding-top: 20px; padding-bottom: 20px;">
    <div class="row">
      <div class="col-lg-12">
        <div class="grid row">
          <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $image_path = !empty($row['main_image']) ? "admin/uploads/photos/{$row['main_image']}" : "default_image.png";

              // --- SEO FRIENDLY LINK LOGIC ---
              $blog_link = !empty($row['slug']) ? $row['slug'] : "?id=" . $row['id'];

              // --- HEADING LOGIC ---
              // english_heading unte adi, lekapothe title chupisthundi
              $display_title = !empty($row['english_heading']) ? $row['english_heading'] : $row['title'];

              echo "
              <div class='grid-item col-sm-12 col-lg-4 mb-5'>
                  <div class='post-box card_bg_div_box'>
                      <figure>
                          <a href='{$blog_link}'>
                              <img src='{$image_path}' alt='Blog Image' class='img-fluid blog_box_image' style='height:250px; width:100%; object-fit:cover;'>
                          </a>
                      </figure>
                      <div class='box-content'>
                          <h5 class='box-title'><a class='box-title' href='{$blog_link}'>" . htmlspecialchars($display_title) . "</a></h5>
                          <p class='post-desc mt-5' style='text-align: justify;'>" . substr(strip_tags($row['main_content']), 0, 90) . "...</p>
                          <a href='{$blog_link}'><button class='blog_main_btn'>Read More..</button></a>
                      </div>
                  </div>
              </div>";
            }
          } else {
            echo "<p>No blog posts found.</p>";
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include('./footer.php'); ?>

<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/js/main.js"></script>

</body>

</html>

<?php
$stmt->close();
$conn->close();
?>