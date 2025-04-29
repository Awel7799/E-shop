<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Featured Product Input Form</title>
    <style>
        body {
            background-color: #1a1a1a;
            color: #ffffff;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #2a2a2a;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.2);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #00ffff;
            text-shadow: 0 0 10px #00ffff;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #ffffff;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #00ffff;
            border-radius: 5px;
            background-color: #3a3a3a;
            color: #ffffff;
            font-size: 1rem;
            transition: box-shadow 0.3s ease;
        }
        input:focus {
            outline: none;
            box-shadow: 0 0 10px #00ffff;
        }

        input[type="file"] {
            padding: 0.5rem;
        }

        button {
            width: 100%;
            padding: 1rem;
            background-color: #00ffff;
            border: none;
            border-radius: 5px;
            color: #1a1a1a;
            font-size: 1.2rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 0 15px #00ffff, 0 0 30px #00ffff;
        }

        button:hover {
            background-color: #00cccc;
            box-shadow: 0 0 20px #00ffff, 0 0 40px #00ffff;
            transform: scale(1.05);
        }

        button:active {
            transform: scale(0.95);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Product Input Form</h2>
        <form action="featuredproductdb.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input type="text" id="productName" name="productName" required>
            </div>
            <div class="form-group">
                <label for="price">Price ($)</label>
                <input type="number" id="price" name="price" step="0.01" min="0" required>
            </div>
            <div class="form-group">
                <label for="image">Product Image</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>