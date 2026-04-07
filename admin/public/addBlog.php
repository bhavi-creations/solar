<?php
// Database connection
include '../../db.connection/db_connection.php';

// Generate unique filename
function generateUniqueFileName($fileName)
{
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    return uniqid() . '_' . time() . '.' . $ext;
}

// Allowed image extensions
$allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'];

// Upload image function (Modified to handle old values)
function uploadImage($fileKey, $directoryName, $allowed_extensions, $oldValue = '')
{
    if (!empty($_FILES[$fileKey]['name'])) {
        $ext = strtolower(pathinfo($_FILES[$fileKey]['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, $allowed_extensions)) {
            die("Invalid file type for $fileKey");
        }
        $directory = __DIR__ . "/../uploads/$directoryName/";
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        $fileName = generateUniqueFileName($_FILES[$fileKey]['name']);
        if (move_uploaded_file($_FILES[$fileKey]['tmp_name'], $directory . $fileName)) {
            return $fileName;
        }
    }
    return $oldValue; // Kotha file upload cheyakapothe patha peru return chestundi
}

// Form submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $blog_id = isset($_POST['id']) ? intval($_POST['id']) : 0;

    // Main fields
    $title = $_POST['title'] ?? '';
    $english_heading = $_POST['english_heading'] ?? ''; // Kothaga add chesina field

    // --- SLUG LOGIC ---
    $slug = $_POST['slug'] ?? '';
    if (empty($slug)) {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    } else {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $slug)));
    }

    $main_content = $_POST['main_content'] ?? '';
    $full_content = $_POST['full_content'] ?? '';
    $service = $_POST['service'] ?? '';

    // Telugu fields
    $telugu_title = $_POST['telugu_title'] ?? '';
    $telugu_main_content = $_POST['telugu_main_content'] ?? '';
    $telugu_full_content = $_POST['telugu_full_content'] ?? '';

    // Section content
    $section1_content = $_POST['section1_content'] ?? '';
    $section2_content = $_POST['section2_content'] ?? '';
    $section3_content = $_POST['section3_content'] ?? '';

    // Validation - English Heading ni kuda check cheyali anukunte ikkada add cheyandi
    if (empty($title) || empty($main_content) || empty($full_content) || empty($service)) {
        die("Required fields missing");
    }

    // Upload images - Fallback to old values
    $title_image = uploadImage('title_image', 'photos', $allowed_extensions, $_POST['old_title_image'] ?? '');
    $main_image  = uploadImage('main_image', 'photos', $allowed_extensions, $_POST['old_main_image'] ?? '');

    // Video upload logic
    $video = $_POST['old_video'] ?? '';
    if (!empty($_FILES['video']['name'])) {
        $videoDir = __DIR__ . "/../uploads/videos/";
        if (!is_dir($videoDir)) {
            mkdir($videoDir, 0777, true);
        }
        $video = generateUniqueFileName($_FILES['video']['name']);
        move_uploaded_file($_FILES['video']['tmp_name'], $videoDir . $video);
    }

    // Section images
    $section1_image = uploadImage('section1_image', 'photos', $allowed_extensions, $_POST['old_section1_image'] ?? '');
    $section2_image = uploadImage('section2_image', 'photos', $allowed_extensions, $_POST['old_section2_image'] ?? '');
    $section3_image = uploadImage('section3_image', 'photos', $allowed_extensions, $_POST['old_section3_image'] ?? '');

    // UPDATE
    if ($blog_id > 0) {
        $stmt = $conn->prepare("
            UPDATE blogs SET
                title=?, slug=?, english_heading=?, main_content=?, full_content=?,
                telugu_title=?, telugu_main_content=?, telugu_full_content=?,
                title_image=?, main_image=?, video=?,
                service=?,
                section1_content=?, section1_image=?,
                section2_content=?, section2_image=?,
                section3_content=?, section3_image=?
            WHERE id=?
        ");

        // "ssssssssssssssssssi" -> 18 strings + 1 integer
        $stmt->bind_param(
            "ssssssssssssssssssi",
            $title,
            $slug,
            $english_heading,
            $main_content,
            $full_content,
            $telugu_title,
            $telugu_main_content,
            $telugu_full_content,
            $title_image,
            $main_image,
            $video,
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
    // INSERT
    else {
        $stmt = $conn->prepare("
            INSERT INTO blogs
            (title, slug, english_heading, main_content, full_content,
             telugu_title, telugu_main_content, telugu_full_content,
             title_image, main_image, video,
             service,
             section1_content, section1_image,
             section2_content, section2_image,
             section3_content, section3_image,
             created_at)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())
        ");

        // "ssssssssssssssssss" -> 18 strings
        $stmt->bind_param(
            "ssssssssssssssssss",
            $title,
            $slug,
            $english_heading,
            $main_content,
            $full_content,
            $telugu_title,
            $telugu_main_content,
            $telugu_full_content,
            $title_image,
            $main_image,
            $video,
            $service,
            $section1_content,
            $section1_image,
            $section2_content,
            $section2_image,
            $section3_content,
            $section3_image
        );
    }

    if ($stmt->execute()) {
        header("Location: allBlog.php");
        exit;
    } else {
        die("SQL Error: " . $stmt->error);
    }
}

$conn->close();
