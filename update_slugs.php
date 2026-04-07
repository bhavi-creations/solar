<?php
include './db.connection/db_connection.php';

// Function to convert Title to SEO Friendly Slug
function createSlug($string) {
    $slug = preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Remove special characters
    $slug = preg_replace('/ +/', '-', $slug); // Replace spaces with dashes
    $slug = strtolower(trim($slug, '-')); // Lowercase and trim dashes
    return $slug;
}

// 1. Fetch all blogs where slug is empty or null
$sql = "SELECT id, title FROM blogs WHERE slug IS NULL OR slug = ''";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $count = 0;
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $new_slug = createSlug($row['title']);
        
        // 2. Check if this slug already exists to avoid duplicates
        // (Just adding ID at the end if it exists)
        $check_sql = "SELECT id FROM blogs WHERE slug = ? AND id != ?";
        $stmt_check = $conn->prepare($check_sql);
        $stmt_check->bind_param("si", $new_slug, $id);
        $stmt_check->execute();
        $stmt_check->store_result();
        
        if ($stmt_check->num_rows > 0) {
            $new_slug = $new_slug . '-' . $id; // Duplicate unte ID add chestunnam
        }
        $stmt_check->close();

        // 3. Update the record
        $update_sql = "UPDATE blogs SET slug = ? WHERE id = ?";
        $stmt_update = $conn->prepare($update_sql);
        $stmt_update->bind_param("si", $new_slug, $id);
        $stmt_update->execute();
        $stmt_update->close();
        
        $count++;
        echo "Updated: ID $id -> Slug: $new_slug <br>";
    }
    echo "<h3>Total $count blogs updated successfully!</h3>";
} else {
    echo "No empty slugs found.";
}

$conn->close();
?>