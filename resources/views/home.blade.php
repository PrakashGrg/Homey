<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Tutor - Find Your Perfect Tutor</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo::before {
            content: "🎓";
            font-size: 2rem;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 25px;
        }

        .nav-links a:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .auth-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-primary {
            background: #ff6b6b;
            color: white;
        }

        .btn-primary:hover {
            background: #ff5252;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
        }

        .btn-secondary {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-secondary:hover {
            background: white;
            color: #667eea;
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 8rem 0 4rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" patternUnits="userSpaceOnUse" width="100" height="100"><circle cx="50" cy="50" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            animation: fadeInUp 1s ease;
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            animation: fadeInUp 1s ease 0.2s both;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 1s ease 0.4s both;
        }

        .btn-large {
            padding: 1rem 2rem;
            font-size: 1.1rem;
            border-radius: 30px;
        }

        /* Features Section */
        .features {
            padding: 5rem 0;
            background: #f8f9fa;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 3rem;
            color: #333;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #333;
        }

        .feature-card p {
            color: #666;
            line-height: 1.6;
        }

        /* Benefits Section */
        .benefits {
            padding: 5rem 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-top: 3rem;
        }

        .benefit-item {
            text-align: center;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .benefit-item:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.15);
        }

        .benefit-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        /* Testimonials */
        .testimonials {
            padding: 5rem 0;
            background: #f8f9fa;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .testimonial-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border-left: 4px solid #667eea;
        }

        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: -10px;
            left: 15px;
            font-size: 4rem;
            color: #667eea;
            opacity: 0.2;
            font-family: serif;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            border-left-color: #ff6b6b;
        }

        .testimonial-text {
            font-style: italic;
            margin-bottom: 1.5rem;
            color: #555;
            line-height: 1.6;
            position: relative;
            z-index: 2;
        }

        .testimonial-author {
            font-weight: 600;
            color: #333;
            margin-bottom: 0.25rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .testimonial-author::before {
            content: "⭐";
            font-size: 1rem;
        }

        .testimonial-role {
            color: #667eea;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .testimonial-rating {
            display: flex;
            gap: 2px;
            margin-bottom: 1rem;
        }

        .star {
            color: #ffd700;
            font-size: 1rem;
        }

        /* FAQ Section */
        .faq {
            padding: 5rem 0;
            background: white;
        }

        .faq-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .faq-item {
            margin-bottom: 1rem;
            border: 1px solid #e9ecef;
            border-radius: 10px;
            overflow: hidden;
        }

        .faq-question {
            padding: 1.5rem;
            background: #f8f9fa;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .faq-question:hover {
            background: #e9ecef;
        }

        .faq-answer {
            padding: 0 1.5rem;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-answer.active {
            max-height: 200px;
            padding: 1.5rem;
        }

        /* Footer */
        .footer {
            background: #333;
            color: white;
            padding: 3rem 0 1rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            margin-bottom: 1rem;
            color: #ff6b6b;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.5rem;
        }

        .footer-section ul li a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section ul li a:hover {
            color: #ff6b6b;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid #555;
            color: #ccc;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Admin Login Button */
        .admin-login {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }

        .admin-btn {
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 20px;
            font-weight: 400;
            font-size: 0.8rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 6px;
            backdrop-filter: blur(10px);
        }

        .admin-btn:hover {
            background: rgba(0, 0, 0, 0.8);
        }

        .admin-btn::before {
            content: "⚙️";
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero p {
                font-size: 1.1rem;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .features-grid,
            .benefits-grid,
            .testimonials-grid {
                grid-template-columns: 1fr;
            }

            .admin-login {
                bottom: 15px;
                right: 15px;
            }

            .admin-btn {
                padding: 6px 12px;
                font-size: 0.75rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="nav-container">
            <div class="logo">Home Tutor</div>
            <nav>
                <ul class="nav-links">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#benefits">Benefits</a></li>
                    <li><a href="#testimonials">Reviews</a></li>
                    <li><a href="#faq">FAQ</a></li>
                </ul>
            </nav>
            <div class="auth-buttons">
                <a href="/login" class="btn btn-secondary">Login</a>
                <a href="/register" class="btn btn-primary">Register</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>Find Your Perfect Tutor</h1>
            <p>Connect with qualified tutors online and boost your academic performance through personalized learning. Quality education, anytime, anywhere.</p>
            <div class="cta-buttons">
                <a href="/register" class="btn btn-primary btn-large">Find a Tutor</a>
                <a href="/register" class="btn btn-secondary btn-large">Become a Tutor</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <h2 class="section-title">Platform Features</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🔍</div>
                    <h3>Smart Matching</h3>
                    <p>Advanced algorithm matches students with the perfect tutors based on subjects, location, price, and availability.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">✅</div>
                    <h3>Verified Tutors</h3>
                    <p>All tutors are thoroughly verified with credentials, experience, and qualifications checked by our admin team.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💬</div>
                    <h3>Secure Communication</h3>
                    <p>Built-in chat system for private communication between students and tutors with real-time notifications.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💳</div>
                    <h3>Safe Payments</h3>
                    <p>Integrated with trusted payment gateways like Esewa and PhonePay for secure transactions.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📅</div>
                    <h3>Easy Scheduling</h3>
                    <p>Flexible booking system with calendar integration for convenient class scheduling and management.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">⭐</div>
                    <h3>Rating System</h3>
                    <p>Transparent review and rating system to help students choose the best tutors for their needs.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="benefits" id="benefits">
        <div class="container">
            <h2 class="section-title">Why Choose Home Tutor?</h2>
            <div class="benefits-grid">
                <div class="benefit-item">
                    <div class="benefit-icon">🎯</div>
                    <h3>For Students</h3>
                    <p>Personalized learning experience with qualified tutors at affordable rates</p>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">💼</div>
                    <h3>For Tutors</h3>
                    <p>Flexible earning opportunities with a growing student community</p>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">🛡️</div>
                    <h3>Secure Platform</h3>
                    <p>Safe and reliable environment for learning and teaching</p>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">📱</div>
                    <h3>Easy to Use</h3>
                    <p>User-friendly interface accessible from any device</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials" id="testimonials">
        <div class="container">
            <h2 class="section-title">What Our Users Say</h2>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                    <div class="testimonial-text">
                        Home Tutor helped me find an amazing math tutor who improved my grades significantly. The platform is easy to use and the tutors are very professional.
                    </div>
                    <div class="testimonial-author">Sarah Johnson</div>
                    <div class="testimonial-role">High School Student</div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                    <div class="testimonial-text">
                        As a tutor, I love how Home Tutor connects me with motivated students. The payment system is secure and the scheduling is very convenient.
                    </div>
                    <div class="testimonial-author">Dr. Michael Chen</div>
                    <div class="testimonial-role">Physics Tutor</div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                    <div class="testimonial-text">
                        The verification process gives me confidence in the quality of tutors. My daughter's English has improved dramatically since joining.
                    </div>
                    <div class="testimonial-author">Priya Sharma</div>
                    <div class="testimonial-role">Parent</div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq" id="faq">
        <div class="faq-container">
            <h2 class="section-title">Frequently Asked Questions</h2>
            <div class="faq-item">
                <div class="faq-question">
                    <span>How do I find the right tutor?</span>
                    <span>+</span>
                </div>
                <div class="faq-answer">
                    <p>Use our smart search and filter system to find tutors based on subject, location, price range, ratings, and availability. You can also view tutor profiles and read reviews from other students.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    <span>How are tutors verified?</span>
                    <span>+</span>
                </div>
                <div class="faq-answer">
                    <p>All tutors must submit their CV, qualifications, experience, and current employment details. Our admin team thoroughly reviews each application before approval.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    <span>Is the payment system secure?</span>
                    <span>+</span>
                </div>
                <div class="faq-answer">
                    <p>Yes, we use trusted payment gateways like Esewa and PhonePay. All transactions are encrypted and logged for security. Refunds are available if classes are canceled.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    <span>Can I cancel or reschedule classes?</span>
                    <span>+</span>
                </div>
                <div class="faq-answer">
                    <p>Yes, you can cancel or reschedule classes according to our policy. Both students and tutors will receive notifications about any changes.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Home Tutor</h3>
                    <p>Connecting students with qualified tutors for personalized learning experiences.</p>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">Find a Tutor</a></li>
                        <li><a href="#">Become a Tutor</a></li>
                        <li><a href="#">How it Works</a></li>
                        <li><a href="#">Pricing</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Support</h3>
                    <ul>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Contact Info</h3>
                    <ul>
                        <li>📧 support@hometutor.com</li>
                        <li>📞 +977-61-460000</li>
                        <li>📍 Pokhara, Kaski, Nepal</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2025 Home Tutor. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Admin Login Button -->
    <div class="admin-login">
        <a href="/login" class="admin-btn">Admin Login</a>
    </div>

    <script>
        // FAQ Toggle Functionality
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const answer = question.nextElementSibling;
                const icon = question.querySelector('span:last-child');
                
                answer.classList.toggle('active');
                icon.textContent = answer.classList.contains('active') ? '-' : '+';
            });
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Header scroll effect
        window.addEventListener('scroll', () => {
            const header = document.querySelector('.header');
            if (window.scrollY > 100) {
                header.style.background = 'rgba(102, 126, 234, 0.95)';
                header.style.backdropFilter = 'blur(20px)';
            } else {
                header.style.background = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
                header.style.backdropFilter = 'blur(10px)';
            }
        });

        // Animate feature cards on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all cards
        document.querySelectorAll('.feature-card, .testimonial-card, .benefit-item').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'all 0.6s ease';
            observer.observe(card);
        });
    </script>
</body>
</html>