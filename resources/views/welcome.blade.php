<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MenuHub - منيو إلكتروني احترافي لمطعمك</title>
    <link rel="stylesheet" href="{{ asset('main/style.css') }}">
</head>

<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">🍽️ MenuHub</div>
                <button class="cta-button" data-before-auth-url="{{ route('before_auth') }}"
                    onclick="redirectToBeforeAuth()">عميل بالغعل؟</button>
            </div>
        </div>
    </header>

    <x-welcome.features-component />

    <x-welcome.pricing-component />

    <section class="final-cta">
        <div class="container">
            <h2>جاهز لتطوير مطعمك؟</h2>
            <p>ابدأ تجربتك المجانية لمدة 14 يوم - بدون بطاقة ائتمانية</p>
            <button class="cta-button" onclick="alert('شكراً لاهتمامك! سيتم التواصل معك قريباً')">ابدأ الآن
                مجاناً</button>
        </div>
    </section>

    <footer>
        <div class="container">
            <p><strong>MenuHub</strong> - حلول المنيو الإلكتروني للمطاعم</p>
            <p>📧 info@menuhub.com | 📱 01234567890</p>
            <p>&copy; 2026 جميع الحقوق محفوظة</p>
        </div>
    </footer>

    <script src="{{ asset('main/main.js') }}"></script>
</body>
</html>
