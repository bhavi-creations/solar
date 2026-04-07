<?php include 'navbar.php' ;?>



<section class="active_zone-section">
  <div class="container text-center">
    
    <h2 class="active_zone-title">Active Service Zones</h2>
    <div class="active_zone-underline"></div>
    <p class="active_zone-subtitle">Nabhas Solar is delivering clean energy across these major locations</p>

    <div class="row g-4 justify-content-center">
      <div class="col-6 col-md-4 col-lg-2">
        <div class="active_zone-card">
          <i class="bi bi-geo-alt-fill active_zone-icon"></i>
          <p class="active_zone-name">Prathipadu</p>
        </div>
      </div>

      <div class="col-6 col-md-4 col-lg-2">
        <div class="active_zone-card">
          <i class="bi bi-geo-alt-fill active_zone-icon"></i>
          <p class="active_zone-name">Jagampeta</p>
        </div>
      </div>

      <div class="col-6 col-md-4 col-lg-2">
        <div class="active_zone-card">
          <i class="bi bi-geo-alt-fill active_zone-icon"></i>
          <p class="active_zone-name">Pithapuram</p>
        </div>
      </div>

      <div class="col-6 col-md-4 col-lg-2">
        <div class="active_zone-card">
          <i class="bi bi-geo-alt-fill active_zone-icon"></i>
          <p class="active_zone-name">Pedapuram</p>
        </div>
      </div>

      <div class="col-6 col-md-4 col-lg-2">
        <div class="active_zone-card">
          <i class="bi bi-geo-alt-fill active_zone-icon"></i>
          <p class="active_zone-name">Annavaram</p>
        </div>
      </div>

      <div class="col-6 col-md-4 col-lg-2">
        <div class="active_zone-card">
          <i class="bi bi-geo-alt-fill active_zone-icon"></i>
          <p class="active_zone-name">Yanam</p>
        </div>
      </div>

    </div>
  </div>
</section>










































<?php
include './db.connection/db_connection.php';

// URL nundi 'id' or 'slug' edhokati teesukuntunnam
$request_val = isset($_GET['slug']) ? mysqli_real_escape_string($conn, $_GET['slug']) : '';

if (empty($request_val)) {
    header("Location: blogs.php");
    exit;
}

// Check if the request is a Numeric ID or a String Slug
if (is_numeric($request_val)) {
    // PATHA BLOGS: ID tho vetuku
    $stmt = $conn->prepare("SELECT * FROM blogs WHERE id = ?");
    $stmt->bind_param("i", $request_val);
} else {
    // KOTHA BLOGS: Slug (Name) tho vetuku
    $stmt = $conn->prepare("SELECT * FROM blogs WHERE slug = ?");
    $stmt->bind_param("s", $request_val);
}

$stmt->execute();
$blog = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$blog) {
    echo "<script>alert('Blog Not Found!'); window.location.href='fullblog_newpage.php';</script>";
    exit;
}




