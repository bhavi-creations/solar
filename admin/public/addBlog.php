<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// DB connection
include '../../db.connection/db_connection.php';

// UTF-8
mysqli_set_charset($conn, "utf8mb4");

// Unique file name
function generateUniqueFileName($fileName)
{
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    return uniqid() . '_' . time() . '.' . $ext;
}

// Allowed image types
$allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'];

// Upload function
function uploadImage($fileKey, $directoryName, $allowed_extensions)
{
    $path = '';

    if (isset($_FILES[$fileKey]) && !empty($_FILES[$fileKey]['name'])) {

        $ext = strtolower(pathinfo($_FILES[$fileKey]['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed_extensions)) {
            die("Invalid file type: " . $fileKey);
        }

        $directory = __DIR__ . "/../uploads/$directoryName/";
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        $fileName = generateUniqueFileName($_FILES[$fileKey]['name']);
        $fullPath = $directory . $fileName;

        if (move_uploaded_file($_FILES[$fileKey]['tmp_name'], $fullPath)) {
            $path = $fileName;
        } else {
            die("Error uploading: " . $fileKey);
        }
    }

    return $path;
}

// Form submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $blog_id = isset($_POST['id']) ? intval($_POST['id']) : 0;

    $title = $_POST['title'] ?? '';
    $slug = $_POST['slug'] ?? '';
    $main_content = $_POST['main_content'] ?? '';
    $full_content = $_POST['full_content'] ?? '';
    $service = $_POST['service'] ?? '';

    $telugu_title = $_POST['telugu_title'] ?? '';
    $telugu_main_content = $_POST['telugu_main_content'] ?? '';
    $telugu_full_content = $_POST['telugu_full_content'] ?? '';

    $section1_content = $_POST['section1_content'] ?? '';
    $section2_content = $_POST['section2_content'] ?? '';
    $section3_content = $_POST['section3_content'] ?? '';

    $hashtags = $_POST['hashtags'] ?? '';
    $keypoints = $_POST['keypoints'] ?? '';

    $hashtags_json = json_encode(array_map('trim', explode(',', $hashtags)));
    $keypoints_json = json_encode(array_map('trim', explode(',', $keypoints)));

    // Required check
    if (empty($title) || empty($slug) || empty($main_content) || empty($full_content) || empty($service)) {
        die("Required fields missing");
    }

    // Uploads
    $title_image_path = uploadImage('title_image', 'photos', $allowed_extensions);
    $main_image_path  = uploadImage('main_image', 'photos', $allowed_extensions);

    $section1_image = uploadImage('section1_image', 'photos', $allowed_extensions);
    $section2_image = uploadImage('section2_image', 'photos', $allowed_extensions);
    $section3_image = uploadImage('section3_image', 'photos', $allowed_extensions);

    // Video
    $video_path = '';
    if (isset($_FILES['video']) && !empty($_FILES['video']['name'])) {

        $video_directory = __DIR__ . "/../uploads/videos/";
        if (!is_dir($video_directory)) {
            mkdir($video_directory, 0777, true);
        }

        $video_name = generateUniqueFileName($_FILES['video']['name']);
        $fullVideoPath = $video_directory . $video_name;

        if (move_uploaded_file($_FILES['video']['tmp_name'], $fullVideoPath)) {
            $video_path = $video_name;
        } else {
            die("Error uploading video");
        }
    }

    // ================= UPDATE =================
    if ($blog_id > 0) {

        $stmt = $conn->prepare("UPDATE blogs SET
            title=?, slug=?, main_content=?, full_content=?,
            telugu_title=?, telugu_main_content=?, telugu_full_content=?,
            hashtags=?, keypoints=?,
            title_image=?, main_image=?, video=?,
            service=?,
            section1_content=?, section1_image=?,
            section2_content=?, section2_image=?,
            section3_content=?, section3_image=?
            WHERE id=?");

        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param(
            "sssssssssssssssssssi",
            $title,
            $slug,
            $main_content,
            $full_content,
            $telugu_title,
            $telugu_main_content,
            $telugu_full_content,
            $hashtags_json,
            $keypoints_json,
            $title_image_path,
            $main_image_path,
            $video_path,
            $service,
            $section1_content,
            $section1_image,
            $section2_content,
            $section2_image,
            $section3_content,
            $section3_image,
            $blog_id
        );
    }

    // ================= INSERT =================
    else {

        $stmt = $conn->prepare("INSERT INTO blogs
        (title, slug, main_content, full_content,
        telugu_title, telugu_main_content, telugu_full_content,
        hashtags, keypoints,
        title_image, main_image, video,
        service,
        section1_content, section1_image,
        section2_content, section2_image,
        section3_content, section3_image, created_at)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())");

        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param(
            "sssssssssssssssssss",
            $title,
            $slug,
            $main_content,
            $full_content,
            $telugu_title,
            $telugu_main_content,
            $telugu_full_content,
            $hashtags_json,
            $keypoints_json,
            $title_image_path,
            $main_image_path,
            $video_path,
            $service,
            $section1_content,
            $section1_image,
            $section2_content,
            $section2_image,
            $section3_content,
            $section3_image
        );
    }

    // Execute
    if (!$stmt->execute()) {
        die("Execute Error: " . $stmt->error);
    }

    $stmt->close();

    header("Location: allBlog.php");
    exit();
}

$conn->close();
?>