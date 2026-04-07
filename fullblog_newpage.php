<?php
include './db.connection/db_connection.php';

// URL నుండి వచ్చే విలువ (ఇది Slug కావచ్చు లేదా పాత ID కావచ్చు)
$request_val = isset($_GET['slug']) ? mysqli_real_escape_string($conn, $_GET['slug']) : '';

if (empty($request_val)) {
    echo "<script>alert('Invalid Blog URL'); window.location.href='blogs.php';</script>";
    exit;
}

// --- HYBRID FETCH LOGIC (SLUG OR ID) ---
if (is_numeric($request_val)) {
    // ఒకవేళ నంబర్ వస్తే ID తో వెతుకుతుంది
    $stmt = $conn->prepare("SELECT * FROM blogs WHERE id = ?");
    $stmt->bind_param("i", $request_val);
} else {
    // అక్షరాలు ఉంటే Slug తో వెతుకుతుంది
    $stmt = $conn->prepare("SELECT * FROM blogs WHERE slug = ?");
    $stmt->bind_param("s", $request_val);
}

$stmt->execute();
$blog = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$blog) {
    echo "<script>alert('Blog not found!'); window.location.href='blogs.php';</script>";
    exit;
}

// NEWSLETTER FETCHING
$latestNewsletter = null;
$news_sql = "SELECT title, pdf_path FROM pdf_uploads ORDER BY id DESC LIMIT 1";
$news_result = $conn->query($news_sql);
if ($news_result && $news_result->num_rows > 0) {
    $latestNewsletter = $news_result->fetch_assoc();
}

function getLimitWords($text, $limit = 15)
{
    $text = strip_tags($text);
    $words = explode(' ', $text);
    if (count($words) > $limit) {
        return implode(' ', array_slice($words, 0, $limit));
    }
    return $text;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($blog['title']); ?> | Nabhas Solar</title>
    <base href="http://localhost/your-project-folder-name/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* నీ పాత CSS కోడ్ ఇక్కడ యధావిధిగా ఉంటుంది */
        :root {
            --primary-navy: #2a7f9e;
            --soft-cream: #f4f9fb;
            --accent-pink: #e3f2f9;
        }

        body {
            background-color: #ffffff;
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        .fullblog-main-container {
            background-color: #ffffff;
            max-width: 1200px;
            margin: 30px auto;
            padding: 40px;
            border-radius: 30px;
            border: 2px solid #2a7f9e;
        }

        .header-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .custom-menu {
            border-top: 1px solid #2a7f9e;
            border-bottom: 1px solid #2a7f9e;
            padding: 10px 0;
            margin: 20px 0;
            display: flex;
            justify-content: center;
            gap: 25px;
        }

        .custom-menu a {
            color: #2a7f9e;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            text-transform: uppercase;
            transition: 0.3s;
        }

        .lang-container {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        .lang-switcher {
            background: #f4f9fb;
            padding: 5px;
            border-radius: 50px;
            display: inline-flex;
        }

        .lang-btn {
            font-size: 13px;
            padding: 8px 20px;
            border-radius: 50px;
            border: none;
            background: transparent;
            color: #2a7f9e;
            font-weight: 600;
            cursor: pointer;
        }

        .lang-btn.active {
            background: #2a7f9e;
            color: white;
        }

        .service-badge {
            background: #2a7f9e;
            color: #ffffff;
            padding: 5px 15px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: 700;
            display: inline-block;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .content-box {
            padding: 30px;
            background: #f4f9fb;
            border-radius: 20px;
            position: relative;
            z-index: 2;
            border: 2px solid #2a7f9e;
            color: #333 !important;
        }

        .img-wrapper img {
            width: 100%;
            height: auto;
            max-height: 500px;
            object-fit: contain;
            border-radius: 25px;
            background-color: #f4f9fb;
        }

        .hidden-content {
            display: none;
            margin-top: 15px;
            padding: 20px;
            background: #f4f9fb;
            border-left: 5px solid var(--primary-navy);
            border-radius: 10px;
            line-height: 1.8;
            animation: fadeIn 0.4s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-dental {
            background: #2a7f9e;
            color: #fff;
            border: 2px solid #d6eaf3;
            padding: 8px 25px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
            margin-top: 15px;
        }

        .sidebar-widget {
            background: #ffffff;
            border: 1px solid #2a7f9e;
            padding: 20px;
            border-radius: 20px;
            margin-bottom: 25px;
        }

        .sidebar-title {
            font-weight: 700;
            font-size: 13px;
            color: #2a7f9e;
            text-transform: uppercase;
            margin-bottom: 15px;
            display: block;
            border-left: 4px solid var(--primary-navy);
            padding-left: 10px;
        }

        .key-point {
            background: #f4f9fb;
            padding: 8px 12px;
            border-radius: 10px;
            font-size: 12px;
            margin-bottom: 8px;
            color: #333;
        }

        .doctor-card-premium {
            background-color: #ffffff;
            border-radius: 25px;
            padding: 35px;
            display: flex;
            align-items: center;
            gap: 30px;
            margin-bottom: 40px;
            border: 1px solid rgba(42, 127, 158, 0.2);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
        }

        .doctor-profile-img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 20px;
            border: 5px solid #fff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container fullblog-main-container">
        <div class="header-section">
            <img src="assets/img/logo.png" style="height:70px" alt="Logo">
            <nav class="custom-menu">
                <a href="index.php">Home</a>
                <a href="about.php">About</a>
                <a href="service.php">Services</a>
                <a href="gallery.php">Gallery</a>
                <a href="blogs.php">Blogs</a>
                <a href="contact.php">Contact</a>
            </nav>
            <div class="lang-container">
                <div class="lang-switcher">
                    <button class="lang-btn active" id="btn-en" onclick="switchLang('en')">English</button>
                    <button class="lang-btn" id="btn-te" onclick="switchLang('te')">తెలుగు</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="doctor-card-premium">
                    <div class="doctor-image-wrapper">
                        <img src="assets/img/favicons.png" class="doctor-profile-img" alt="Nabhas Solar">
                    </div>
                    <div class="doctor-info">
                        <div class="doctor-quote-box">
                            <i class="fas fa-quote-left" style="color: rgba(42, 127, 158, 0.2);"></i>
                            <p class="doctor-description" style="font-size: 14px; color: #555;">
                                Reduce electricity costs and switch to clean energy with reliable solar systems designed for homes, businesses, and industries.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="service-badge"><?php echo htmlspecialchars($blog['service'] ?? 'Solar Energy'); ?></div>
                <h4 class="fw-bold mb-4" id="title-1" style="color: #2a7f9e;"><?php echo htmlspecialchars($blog['title']); ?></h4>

                <div class="row align-items-center mb-4">
                    <div class="col-lg-7 order-2 order-lg-1">
                        <div class="content-box">
                            <p class="small mb-0" id="short-1"><?php echo getLimitWords($blog['main_content'], 15); ?>...</p>
                            <button class="btn btn-dental" id="btn-1" onclick="toggleSection('1')">Read More</button>
                        </div>
                    </div>
                    <div class="col-lg-5 order-1 order-lg-2 img-wrapper">
                        <img src="./admin/uploads/photos/<?php echo $blog['main_image']; ?>" alt="Blog Image">
                    </div>
                </div>
                <div id="full-1" class="hidden-content mb-5"></div>
            </div>

            <div class="col-lg-4">
                <div class="sidebar-widget">
                    <span class="sidebar-title">Our Services</span>
                    <div class="mt-3">
                        <a href="service.php" class="key-point d-block text-decoration-none"><i class="fas fa-check-circle me-2 text-warning"></i>Residential Solar</a>
                        <a href="service.php" class="key-point d-block text-decoration-none"><i class="fas fa-check-circle me-2 text-warning"></i>Commercial Systems</a>
                        <a href="service.php" class="key-point d-block text-decoration-none"><i class="fas fa-check-circle me-2 text-warning"></i>AMC & Support</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const blogData = {
            en: {
                title: <?php echo json_encode($blog['title']); ?>,
                short1: <?php echo json_encode(getLimitWords($blog['main_content'], 15)); ?>,
                remaining1: <?php echo json_encode(mb_substr($blog['main_content'], mb_strlen(getLimitWords($blog['main_content'], 15)))); ?>
            },
            te: {
                title: <?php echo json_encode($blog['telugu_title'] ?: $blog['title']); ?>,
                short1: <?php echo json_encode(getLimitWords($blog['telugu_main_content'] ?: $blog['main_content'], 15)); ?>,
                remaining1: <?php echo json_encode(mb_substr($blog['telugu_main_content'] ?: $blog['main_content'], mb_strlen(getLimitWords($blog['telugu_main_content'] ?: $blog['main_content'], 15)))); ?>
            }
        };

        let currentLang = 'en';

        function switchLang(lang) {
            currentLang = lang;
            document.getElementById('title-1').innerText = blogData[lang].title;
            document.getElementById('short-1').innerText = blogData[lang].short1 + "...";
            document.getElementById('btn-en').classList.toggle('active', lang === 'en');
            document.getElementById('btn-te').classList.toggle('active', lang === 'te');
            resetSection('1');
        }

        function toggleSection(sid) {
            const fullDiv = document.getElementById('full-' + sid);
            const btn = document.getElementById('btn-' + sid);
            const content = blogData[currentLang]['remaining' + sid].replace(/\n/g, "<br>");

            if (fullDiv.style.display === "block") {
                fullDiv.style.display = "none";
                btn.innerText = "Read More";
            } else {
                fullDiv.innerHTML = content;
                fullDiv.style.display = "block";
                btn.innerText = "Read Less";
            }
        }

        function resetSection(sid) {
            const fullDiv = document.getElementById('full-' + sid);
            if (fullDiv) {
                fullDiv.style.display = "none";
                const btn = document.getElementById('btn-' + sid);
                if (btn) btn.innerText = "Read More";
            }
        }
    </script>
</body>

</html>