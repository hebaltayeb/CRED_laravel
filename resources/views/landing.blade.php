<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyStore - Premium Products</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #4a6cf7;
            --secondary: #f97316;
            --dark: #111827;
            --light: #f9fafb;
            --success: #10b981;
            --text-dark: #1f2937;
            --text-light: #6b7280;
        }
        
        body {
            font-family: 'Inter', 'Segoe UI', Roboto, sans-serif;
            color: var(--text-dark);
            line-height: 1.6;
            padding-top: 80px; /* Added for fixed navbar */
        }
        
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                        url('https://source.unsplash.com/random/1600x900/?store');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 120px 0;
            margin-top: -80px; /* To counter the padding-top from body */
        }
        
        .btn-primary {
            background-color: var(--primary);
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: #3451d1;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(74, 108, 247, 0.2);
        }
        
        .btn-secondary {
            background-color: var(--secondary);
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            background-color: #ea580c;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(249, 115, 22, 0.2);
        }
        
        .feature-card {
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .product-card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .testimonial-card {
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            background-color: white;
        }
        
        .testimonial-section {
            background-color: #f3f4f6;
            padding: 100px 0;
        }
        
        .footer {
            background-color: var(--dark);
            color: white;
            padding: 60px 0 30px;
        }
        
        .navbar {
            padding: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        .nav-link {
            font-weight: 500;
            margin: 0 15px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            color: var(--primary);
        }
        
        /* Animation classes */
        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        #back-to-top {
            display: none;
            width: 50px;
            height: 50px;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <!-- Replace with your actual logo or text -->
                <span class="fw-bold text-primary">MyStore</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary ms-3" href="#shop">Shop Now</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 fade-in">
                    <h1 class="display-4 fw-bold mb-4">Discover Premium Quality Products</h1>
                    <p class="lead mb-5">Top quality at unbeatable prices. Experience excellence with every purchase.</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="#shop" class="btn btn-primary btn-lg">Shop Now</a>
                        <a href="#about" class="btn btn-outline-light btn-lg">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5 my-5" id="about">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="fw-bold">Why Choose Us</h2>
                    <p class="text-muted">We're committed to providing exceptional value and service</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card text-center h-100">
                        <div class="mb-4">
                            <i class="fas fa-shipping-fast fa-3x text-primary"></i>
                        </div>
                        <h3>Fast Delivery</h3>
                        <p class="text-muted">Get your products delivered quickly and efficiently to your doorstep.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card text-center h-100">
                        <div class="mb-4">
                            <i class="fas fa-medal fa-3x text-primary"></i>
                        </div>
                        <h3>Premium Quality</h3>
                        <p class="text-muted">We source only the best materials and products for our customers.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card text-center h-100">
                        <div class="mb-4">
                            <i class="fas fa-headset fa-3x text-primary"></i>
                        </div>
                        <h3>24/7 Support</h3>
                        <p class="text-muted">Our customer service team is always ready to assist you.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="fw-bold">Latest Products</h2>
                    <p class="text-muted">Check out our newest arrivals and bestsellers</p>
                </div>
            </div>
            <div class="row g-4">
                <!-- Product 1 -->
                <div class="col-md-4">
                    <div class="product-card h-100">
                        <img src="https://source.unsplash.com/random/600x400/?product" alt="Product Name" class="img-fluid">
                        <div class="p-4">
                            <h4>Premium Headphones</h4>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fw-bold text-primary">$149.99</span>
                                <a href="#" class="btn btn-sm btn-outline-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product 2 -->
                <div class="col-md-4">
                    <div class="product-card h-100">
                        <img src="https://source.unsplash.com/random/600x400/?electronics" alt="Product Name" class="img-fluid">
                        <div class="p-4">
                            <h4>Smart Watch</h4>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fw-bold text-primary">$199.99</span>
                                <a href="#" class="btn btn-sm btn-outline-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product 3 -->
                <div class="col-md-4">
                    <div class="product-card h-100">
                        <img src="https://source.unsplash.com/random/600x400/?gadget" alt="Product Name" class="img-fluid">
                        <div class="p-4">
                            <h4>Wireless Speaker</h4>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fw-bold text-primary">$89.99</span>
                                <a href="#" class="btn btn-sm btn-outline-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="#shop" class="btn btn-primary" id="shop">View All Products</a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonial-section">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="fw-bold">What Our Customers Say</h2>
                    <p class="text-muted">Real reviews from satisfied customers</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="testimonial-card h-100">
                        <div class="mb-3 text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="mb-4">"Amazing quality and fast delivery! Couldn't be happier with my purchase."</p>
                        <div class="d-flex align-items-center">
                            <img src="https://source.unsplash.com/random/100x100/?person" alt="John Doe" class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <h5 class="mb-0">John Doe</h5>
                                <small class="text-muted">Loyal Customer</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card h-100">
                        <div class="mb-3 text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="mb-4">"Great prices and excellent customer service. I'll definitely be shopping here again!"</p>
                        <div class="d-flex align-items-center">
                            <img src="https://source.unsplash.com/random/100x100/?woman" alt="Sarah Lee" class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <h5 class="mb-0">Sarah Lee</h5>
                                <small class="text-muted">New Customer</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card h-100">
                        <div class="mb-3 text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="mb-4">"I love shopping here. Highly recommended! The products are exactly as described."</p>
                        <div class="d-flex align-items-center">
                            <img src="https://source.unsplash.com/random/100x100/?man" alt="Mark Smith" class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <h5 class="mb-0">Mark Smith</h5>
                                <small class="text-muted">Regular Customer</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold mb-4">Don't Miss Out!</h2>
                    <p class="mb-4">Sign up for exclusive deals and discounts.</p>
                    <form class="row g-3 justify-content-center">
                        <div class="col-md-8">
                            <input type="email" class="form-control form-control-lg" placeholder="Your Email Address">
                        </div>
                        <div class="col-md-auto">
                            <button type="submit" class="btn btn-secondary btn-lg">Sign Up Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h4 class="text-white mb-4">MyStore</h4>
                    <p>We provide top-quality products at unbeatable prices. Shop with confidence and enjoy excellent customer service.</p>
                    <div class="mt-4">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-2">
                    <h5 class="mb-4">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Home</a></li>
                        <li class="mb-2"><a href="#shop" class="text-white text-decoration-none">Shop</a></li>
                        <li class="mb-2"><a href="#about" class="text-white text-decoration-none">About Us</a></li>
                        <li class="mb-2"><a href="#contact" class="text-white text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h5 class="mb-4">Categories</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Electronics</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Clothing</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Home & Garden</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">Sports</a></li>
                    </ul>
                </div>
                <div class="col-lg-4" id="contact">
                    <h5 class="mb-4">Contact Us</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> 123 Store Street, City, Country</li>
                        <li class="mb-2"><i class="fas fa-phone me-2"></i> +1 234 567 8900</li>
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i> info@mystore.com</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 bg-secondary">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">&copy; 2025 MyStore. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="text-white text-decoration-none me-3">Privacy Policy</a>
                    <a href="#" class="text-white text-decoration-none me-3">Terms of Service</a>
                    <a href="#" class="text-white text-decoration-none">Refund Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to top button -->
    <a href="#" class="btn btn-primary btn-lg position-fixed bottom-0 end-0 m-4 rounded-circle" id="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- Bootstrap JS bundle -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // Initialize smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetElement = document.querySelector(this.getAttribute('href'));
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Show/hide back to top button based on scroll position
        const backToTopBtn = document.getElementById('back-to-top');
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopBtn.style.display = 'flex';
            } else {
                backToTopBtn.style.display = 'none';
            }
        });
        
        // Add fade-in animation to elements when they enter the viewport
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };
        
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        document.querySelectorAll('.feature-card, .product-card, .testimonial-card').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>