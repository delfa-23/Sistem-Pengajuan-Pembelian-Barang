<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcover - Landing Page</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
</head>
<body>
    <!-- Header Section -->
    <header>
        <nav>
            <h1>Upcover</h1>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#testimonial">Testimonial</a></li>
                <li><a href="#pricing">Pricing</a></li>
                <li><a href="#blogs">Blogs</a></li>
                <li><a href="#contact">Contact Us</a></li>
                <li><a href="#login">Login</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="hero" style="display: flex; align-items: center; justify-content: space-between; padding: 50px;">
        <div>
            <h2>Get Creative & Modern With Upcover</h2>
            <p>This is just a simple text made for this unique and awesome template, you can replace it with any text.</p>
            <a href="#contact" class="btn">Contact Us</a>
        </div>
        <div>
            <img src="path_to_your_image.svg" alt="Illustration" style="max-width: 300px;"/>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2023 Upcover. All rights reserved.</p>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
