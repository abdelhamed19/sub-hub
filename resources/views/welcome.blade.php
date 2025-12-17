<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MenuHub - منيو إلكتروني احترافي لمطعمك</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            background: rgba(255, 255, 255, 0.95);
            padding: 20px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #667eea;
        }

        .cta-button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        /* Hero Section */
        .hero {
            padding: 100px 0;
            text-align: center;
            color: white;
        }

        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .hero p {
            font-size: 22px;
            margin-bottom: 40px;
            opacity: 0.95;
        }

        .hero-image {
            margin: 50px 0;
            text-align: center;
        }

        .phone-mockup {
            width: 300px;
            height: 600px;
            background: white;
            border-radius: 40px;
            display: inline-block;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            padding: 15px;
            position: relative;
        }

        .phone-screen {
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, #f8f9fa, #e9ecef);
            border-radius: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .menu-preview {
            background: white;
            width: 90%;
            padding: 15px;
            border-radius: 15px;
            margin: 10px 0;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            text-align: right;
        }

        .menu-item {
            color: #333;
            font-size: 14px;
            margin: 8px 0;
        }

        /* Features Section */
        .features {
            background: white;
            padding: 80px 0;
        }

        .features h2 {
            text-align: center;
            font-size: 38px;
            margin-bottom: 60px;
            color: #333;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
        }

        .feature-card {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }

        .feature-icon {
            font-size: 50px;
            margin-bottom: 20px;
        }

        .feature-card h3 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #667eea;
        }

        .feature-card p {
            font-size: 16px;
            color: #555;
        }

        /* Pricing Section */
        .pricing {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 80px 0;
            color: white;
        }

        .pricing h2 {
            text-align: center;
            font-size: 38px;
            margin-bottom: 60px;
        }

        .pricing-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .pricing-card {
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            color: #333;
            transition: transform 0.3s;
        }

        .pricing-card:hover {
            transform: scale(1.05);
        }

        .pricing-card.featured {
            background: white;
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
        }

        .pricing-card h3 {
            font-size: 28px;
            margin-bottom: 15px;
            color: #667eea;
        }

        .price {
            font-size: 42px;
            font-weight: bold;
            margin: 20px 0;
            color: #764ba2;
        }

        .price span {
            font-size: 18px;
        }

        .features-list {
            list-style: none;
            margin: 30px 0;
            text-align: right;
        }

        .features-list li {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .features-list li:before {
            content: "✓ ";
            color: #667eea;
            font-weight: bold;
            margin-left: 10px;
        }

        /* CTA Section */
        .final-cta {
            background: white;
            padding: 80px 0;
            text-align: center;
        }

        .final-cta h2 {
            font-size: 38px;
            margin-bottom: 20px;
            color: #333;
        }

        .final-cta p {
            font-size: 20px;
            margin-bottom: 40px;
            color: #666;
        }

        /* Footer */
        footer {
            background: #2d3748;
            color: white;
            padding: 40px 0;
            text-align: center;
        }

        footer p {
            margin: 10px 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 32px;
            }

            .hero p {
                font-size: 18px;
            }

            .phone-mockup {
                width: 250px;
                height: 500px;
            }

            .features h2, .pricing h2, .final-cta h2 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">🍽️ MenuHub</div>
                <button class="cta-button" onclick="scrollToSection('pricing')">اشترك الآن</button>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <h1>منيو إلكتروني احترافي لمطعمك</h1>
            <p>حوّل تجربة عملائك مع منيو رقمي تفاعلي وسهل الاستخدام</p>
            <button class="cta-button" onclick="scrollToSection('pricing')">ابدأ تجربتك المجانية</button>

            <div class="hero-image">
                <div class="phone-mockup">
                    <div class="phone-screen">
                        <div class="menu-preview">
                            <div class="menu-item">🍕 بيتزا مارجريتا - 85 جنيه</div>
                            <div class="menu-item">🍔 برجر لحم - 95 جنيه</div>
                            <div class="menu-item">🍝 باستا ألفريدو - 75 جنيه</div>
                        </div>
                        <div class="menu-preview">
                            <div class="menu-item">🥤 مشروبات غازية - 15 جنيه</div>
                            <div class="menu-item">☕ قهوة تركي - 25 جنيه</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <h2>لماذا MenuHub؟</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">📱</div>
                    <h3>سهل الاستخدام</h3>
                    <p>واجهة بسيطة وسريعة لعملائك، بدون تطبيقات معقدة - فقط امسح الكود وشوف المنيو</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">⚡</div>
                    <h3>تحديثات فورية</h3>
                    <p>غيّر الأسعار والأصناف في أي وقت، والتحديثات تظهر فوراً لجميع العملاء</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🎨</div>
                    <h3>تصميم مخصص</h3>
                    <p>منيو يعكس هوية مطعمك بألوانك وشعارك الخاص</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💰</div>
                    <h3>وفّر في التكاليف</h3>
                    <p>لا حاجة لطباعة منيوهات جديدة كل مرة، وفّر فلوس ووقت</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <h3>تقارير وإحصائيات</h3>
                    <p>اعرف أكثر الأصناف مبيعاً وسلوك عملائك</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🌍</div>
                    <h3>متعدد اللغات</h3>
                    <p>منيو بالعربي والإنجليزي لخدمة جميع عملائك</p>
                </div>
            </div>
        </div>
    </section>

    <section class="pricing" id="pricing">
        <div class="container">
            <h2>اختر الباقة المناسبة لمطعمك</h2>
            <div class="pricing-cards">
                <div class="pricing-card">
                    <h3>الباقة الأساسية</h3>
                    <div class="price">299 <span>جنيه/شهر</span></div>
                    <ul class="features-list">
                        <li>منيو إلكتروني كامل</li>
                        <li>حتى 50 صنف</li>
                        <li>QR Code مخصص</li>
                        <li>تحديثات غير محدودة</li>
                        <li>دعم فني أساسي</li>
                    </ul>
                    <button class="cta-button">اشترك الآن</button>
                </div>

                <div class="pricing-card featured">
                    <h3>الباقة المميزة</h3>
                    <div class="price">499 <span>جنيه/شهر</span></div>
                    <ul class="features-list">
                        <li>كل مميزات الباقة الأساسية</li>
                        <li>أصناف غير محدودة</li>
                        <li>تصميم مخصص</li>
                        <li>صور احترافية للأصناف</li>
                        <li>تقارير وإحصائيات</li>
                        <li>دعم فني ذهبي</li>
                        <li>نظام الطلبات الإلكتروني</li>
                    </ul>
                    <button class="cta-button">الأكثر طلباً</button>
                </div>

                <div class="pricing-card">
                    <h3>باقة المؤسسات</h3>
                    <div class="price">تواصل معنا</div>
                    <ul class="features-list">
                        <li>لأكثر من فرع</li>
                        <li>إدارة مركزية</li>
                        <li>تكامل مع أنظمة POS</li>
                        <li>مدير حساب مخصص</li>
                        <li>تدريب للفريق</li>
                        <li>دعم فني مميز 24/7</li>
                    </ul>
                    <button class="cta-button">تواصل معنا</button>
                </div>
            </div>
        </div>
    </section>

    <section class="final-cta">
        <div class="container">
            <h2>جاهز لتطوير مطعمك؟</h2>
            <p>ابدأ تجربتك المجانية لمدة 14 يوم - بدون بطاقة ائتمانية</p>
            <button class="cta-button" onclick="alert('شكراً لاهتمامك! سيتم التواصل معك قريباً')">ابدأ الآن مجاناً</button>
        </div>
    </section>

    <footer>
        <div class="container">
            <p><strong>MenuHub</strong> - حلول المنيو الإلكتروني للمطاعم</p>
            <p>📧 info@menuhub.com | 📱 01234567890</p>
            <p>&copy; 2024 جميع الحقوق محفوظة</p>
        </div>
    </footer>

    <script>
        function scrollToSection(id) {
            const element = document.getElementById(id);
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' });
            }
        }
    </script>
</body>
</html>
