<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>اختيار نوع الحساب</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Cairo', sans-serif;
        }

        .page-wrapper {
            background: #fff;
            border-radius: 20px;
            padding: 40px 30px;
            width: 100%;
            max-width: 1000px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, .15);
        }

        .page-title {
            font-weight: bold;
        }

        .role-card {
            border: none;
            border-radius: 18px;
            padding: 30px 20px;
            text-align: center;
            height: 100%;
            transition: all .3s ease;
            background: #f8f9fa;
            cursor: pointer;
        }

        .role-card:hover {
            transform: translateY(-10px);
            background: #fff;
            box-shadow: 0 15px 30px rgba(0, 0, 0, .15);
        }

        .role-icon {
            font-size: 45px;
            margin-bottom: 15px;
            color: #6c63ff;
        }

        .role-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .role-desc {
            font-size: 14px;
            color: #6c757d;
        }

        a.role-link {
            text-decoration: none;
            color: inherit;
        }

        @media (max-width: 768px) {
            .page-wrapper {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>

    <div class="page-wrapper">
        <div class="text-center mb-5">
            <h2 class="page-title">أهلاً بيك 👋</h2>
            <p class="text-muted">اختار نوع حسابك علشان نكمل</p>
        </div>

        <div class="row g-4">

            <!-- Super Admin -->
            <div class="col-md-4 col-sm-12">
                <a href="{{ route('super_admin.auth.login') }}" class="role-link">
                    <div class="role-card">
                        <div class="role-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <div class="role-title">سوبر أدمن</div>
                        <div class="role-desc">تحكم كامل في السيستم</div>
                    </div>
                </a>
            </div>

            <!-- Client -->
            <div class="col-md-4 col-sm-12">
                <a href="" class="role-link">
                    <div class="role-card">
                        <div class="role-icon">
                            <i class="bi bi-person-badge"></i>
                        </div>
                        <div class="role-title">عميل</div>
                        <div class="role-desc">الدخول وإدارة حسابك</div>
                    </div>
                </a>
            </div>

            <!-- Assistant -->
            <div class="col-md-4 col-sm-12">
                <a href="" class="role-link">
                    <div class="role-card">
                        <div class="role-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="role-title">مساعد</div>
                        <div class="role-desc">تنفيذ ومتابعة المهام</div>
                    </div>
                </a>
            </div>

        </div>
    </div>

</body>

</html>
