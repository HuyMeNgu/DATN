
<form action="add_product.php" method="POST" enctype="multipart/form-data">
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required><br><br>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br><br>
        
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" required><br><br>
        
        <label for="category_id">Category ID:</label>
        <input type="number" id="category_id" name="category_id" required><br><br>
        
        <label for="brand_id">Brand ID:</label>
        <input type="number" id="brand_id" name="brand_id" required><br><br>
        
        <label for="rating">Rating:</label>
        <input type="number" id="rating" name="rating" step="0.1" max="5" required><br><br>
        
        <label for="is_active">Is Active:</label>
        <input type="checkbox" id="is_active" name="is_active"><br><br>
        
        <label for="colors">Select Colors and Upload Images:</label><br>
        <?php
        // Connect to database to fetch available colors
        $conn = new mysqli("localhost", "root", "", "balostore");
        $query = "SELECT id, color_name FROM colors";
        $result = $conn->query($query);
        
        while ($row = $result->fetch_assoc()) {
            echo '<div>';
            echo '<input type="checkbox" name="color_ids[]" value="' . $row['id'] . '">';
            echo '<label>' . $row['color_name'] . '</label>';
            echo '<input type="file" name="img_paths[' . $row['id'] . ']" accept="image/*" required>';
            echo '</div>';
        }
        ?>
        <br><br>
        <button type="submit">Add Product</button>
    </form>