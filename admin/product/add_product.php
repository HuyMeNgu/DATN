<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "balostore");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect product details
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $brand_id = $_POST['brand_id'];
    $rating = $_POST['rating'];
    $is_active = isset($_POST['is_active']) ? 1 : 0;

    // Insert product details
    $stmt = $conn->prepare("INSERT INTO products (product_name, description, price, category_id, brand_id, rating, is_active, create_at, update_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())");
    $stmt->bind_param("ssdiidi", $product_name, $description, $price, $category_id, $brand_id, $rating, $is_active);
    $stmt->execute();
    $product_id = $stmt->insert_id;
    $stmt->close();

    // Insert colors and image paths
    if (!empty($_POST['color_ids'])) {
        foreach ($_POST['color_ids'] as $color_id) {
            if (isset($_FILES['img_paths']['name'][$color_id]) && $_FILES['img_paths']['error'][$color_id] == 0) {
                $target_dir = "uploads/";
                $img_path = $target_dir . basename($_FILES['img_paths']['name'][$color_id]);
                move_uploaded_file($_FILES['img_paths']['tmp_name'][$color_id], $img_path);

                // Insert color and image for the product
                $quantity = 100; // Default quantity or fetch from form if needed
                $stmt = $conn->prepare("INSERT INTO productcolors (product_id, color_id, img_path, quantity) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("iisi", $product_id, $color_id, $img_path, $quantity);
                $stmt->execute();
                $stmt->close();
            }
        }
    }

    echo "Product and colors added successfully!";
}
?>
