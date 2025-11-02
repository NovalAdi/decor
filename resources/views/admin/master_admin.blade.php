<?php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        h2 {
            font-weight: 600;
        }

        /* ============================
           TABLE STYLE
        ============================ */
        .table thead {
            background-color: #f1f1f1;
        }

        .table-hover tbody tr:hover {
            background-color: #e9f7ef;
            transition: 0.3s;
        }

        /* ============================
           BUTTON STYLE
        ============================ */
        .btn-success, .btn-danger {
            width: 80px;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        .btn-danger:hover {
            background-color: #c82333;
            transform: scale(1.05);
        }

        /* ============================
           ACTION BUTTON ALIGNMENT
        ============================ */
        .action-buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
        }

        @media (min-width: 768px) {
            .action-buttons {
                flex-direction: row;
                justify-content: center;
            }
        }

        /* ============================
           INPUT SEARCH STYLE
        ============================ */
        input[type="text"]::placeholder {
            color: #aaa;
            font-style: italic;
        }

        input[type="text"]:focus {
            border-color: #28a745;
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.3);
        }

        /* ============================
           CARD HEADER EFFECT
        ============================ */
        .card h2 {
            color: #212529;
            transition: color 0.3s ease;
        }

        .card:hover h2 {
            color: #198754;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        @yield('content')
    </div>
</body>
</html>
