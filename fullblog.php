<?php
include './db.connection/db_connection.php';

// 1. URL nundi ID leda Slug ni teeskuntunnam
$slug_from_url = isset($_GET['slug']) ? $_GET['slug'] : '';
$id_from_url = isset($_GET['id']) ? intval($_GET['id']) : 0;

if (empty($slug_from_url) && $id_from_url <= 0) {
    echo "Invalid Blog Request";
    exit;
}

// 2. Fetch Blog Data - english_heading ni SQL lo add chesam
if (!empty($slug_from_url)) {
    // Slug unte priority daanike
    $stmt = $conn->prepare("SELECT id, slug, title, english_heading, main_content, full_content, title_image, main_image, video, telugu_title, telugu_main_content, telugu_full_content, section1_image, service FROM blogs WHERE slug = ?");
    $stmt->bind_param("s", $slug_from_url);
} else {
    // ID unte ID tho vethukuthunnam
    $stmt = $conn->prepare("SELECT id, slug, title, english_heading, main_content, full_content, title_image, main_image, video, telugu_title, telugu_main_content, telugu_full_content, section1_image, service FROM blogs WHERE id = ?");
    $stmt->bind_param("i", $id_from_url);
}

$stmt->execute();
// Variable sequence correct ga bind chesam
$stmt->bind_result($fetched_id, $fetched_slug, $title, $english_heading, $main_content, $full_content, $title_image, $main_image, $video, $telugu_title, $telugu_main_content, $telugu_full_content, $section1_image, $service);
$stmt->fetch();
$stmt->close();

// Check if blog exists
if (!$fetched_id) {
    echo "Blog not found.";
    exit;
}

// Heading empty unte default ga title chupinchadaniki logic
$final_heading = !empty($english_heading) ? $english_heading : $title;

// 3. SEO REDIRECTION LOGIC
if ($id_from_url > 0 && !empty($fetched_slug)) {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: " . $fetched_slug);
    exit();
}

$blog_id = $fetched_id;

// 4. Fetch Like / Dislike Counts
$count_sql = "SELECT 
                SUM(reaction='like') AS likes, 
                SUM(reaction='dislike') AS dislikes 
              FROM blog_reactions 
              WHERE blog_id = ?";
$count_stmt = $conn->prepare($count_sql);
$count_stmt->bind_param("i", $blog_id);
$count_stmt->execute();
$count_stmt->bind_result($likes_count, $dislikes_count);
$count_stmt->fetch();
$count_stmt->close();
?>

<?php include 'navbar.php'; ?>

<main>
    <div class="container blog-detailed" style="padding-top: 50px;">

        <div class="d-flex justify-content-center mb-3">
            <button id="english-btn" class="lang-btn english-btn active">English</button>
            <button id="telugu-btn" class="lang-btn telugu-btn mx-4">తెలుగు</button>
        </div>

        <?php if (!empty($service)) { ?>
            <div class="text-center mb-3">
                <span class="badge_service_name px-4 py-2">
                    <?= htmlspecialchars($service) ?>
                </span>
            </div>
        <?php } ?>

        <div class="text-center mb-4">
            <?php if (!empty($section1_image)): ?>
                <img src="./admin/uploads/photos/<?php echo $section1_image; ?>" class="img-fluid" style="width:600px;">
            <?php endif; ?>
        </div>

        <div class="text-center mb-4">
            <?php
            if (!empty($video)) {
                $video_path = "./admin/uploads/videos/{$video}";
                echo "<video class='main-video' controls style='max-width:700px; width:100%; height:auto; display:block; margin:0 auto;'>
                        <source src='{$video_path}' type='video/mp4'>
                        Your browser does not support the video tag.
                      </video>";
            } elseif (!empty($main_image)) {
                $main_image_path = "./admin/uploads/photos/{$main_image}";
                echo "<img src='{$main_image_path}' class='img-fluid' style='max-width:700px;'>";
            }
            ?>
        </div>

        <h4 class="blog-title text-center mt-5" style="color:#283779; font-weight:800;">
            <span id="title-en"><?php echo $final_heading; ?></span>
            <span id="title-te" style="display:none;"><?php echo $telugu_title; ?></span>
        </h4>

        <div class="main-content" style="text-align:justify;">
            <div id="main-en"><?php echo $main_content; ?></div>
            <div id="main-te" style="display:none;"><?php echo $telugu_main_content; ?></div>
        </div>

        <div class="full-content">
            <div id="full-en"><?php echo $full_content; ?></div>
            <div id="full-te" style="display:none;"><?php echo $telugu_full_content; ?></div>
        </div>
    </div>

    <div class="container">
        <div class="blogs_side my-5">
            <div class="side-bar">
                <h1 class="d-flex justify-content-center my-3">LATEST BLOGS</h1>
                <div class="swiper blog-swiper">
                    <div class="swiper-wrapper">
                        <?php
                        // Sidebar lo kooda english_heading fetch chesthunnam
                        $sql_latest = "SELECT id, slug, title, english_heading, main_image FROM blogs ORDER BY created_at DESC LIMIT 10";
                        $res_latest = $conn->query($sql_latest);

                        if ($res_latest->num_rows > 0) {
                            while ($row = $res_latest->fetch_assoc()) {
                                $sidebar_img = !empty($row['main_image']) ? "./admin/uploads/photos/{$row['main_image']}" : "default.png";

                                // Sidebar heading logic
                                $s_title = !empty($row['english_heading']) ? $row['english_heading'] : $row['title'];
                                $title_short = mb_strimwidth($s_title, 0, 50, "...");

                                $sidebar_link = !empty($row['slug']) ? $row['slug'] : "fullblog.php?id=" . $row['id'];

                                echo "
                                <div class='swiper-slide d-flex justify-content-center'>
                                    <div class='custom-card background_sidebar text-center' style='width:100%; max-width:400px; height:350px; padding:10px; border-radius:8px; box-shadow:0px 2px 10px rgba(0,0,0,0.1);'>
                                        <div style='height:200px; width:100%; overflow:hidden;'>
                                            <img src='{$sidebar_img}' class='img-fluid' style='width:100%; height:100%; object-fit:cover;'>
                                        </div>
                                        <a href='{$sidebar_link}'>
                                            <p class='blog-card-text mt-2' style='color:black;'>{$title_short}</p>
                                        </a>
                                    </div>
                                </div>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    // Language Switch
    document.getElementById("english-btn").onclick = function() {
        ["title-en", "main-en", "full-en"].forEach(id => document.getElementById(id).style.display = "block");
        ["title-te", "main-te", "full-te"].forEach(id => document.getElementById(id).style.display = "none");
    };
    document.getElementById("telugu-btn").onclick = function() {
        ["title-en", "main-en", "full-en"].forEach(id => document.getElementById(id).style.display = "none");
        ["title-te", "main-te", "full-te"].forEach(id => document.getElementById(id).style.display = "block");
    };

    // Swiper Init
    var blogSwiper = new Swiper(".blog-swiper", {
        slidesPerView: 3,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 2500
        },
        breakpoints: {
            0: {
                slidesPerView: 1
            },
            520: {
                slidesPerView: 2
            },
            950: {
                slidesPerView: 3
            }
        }
    });

    const buttons = document.querySelectorAll('.lang-btn');
    buttons.forEach(btn => {
        btn.addEventListener('click', () => {
            buttons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
        });
    });
</script>

<?php $conn->close(); ?>
</body>

</html>