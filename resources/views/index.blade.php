<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Citas Médicas</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #0f172a, #1e293b);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .container {
            background: rgba(255,255,255,0.05);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }

        h1 {
            font-size: 40px;
            margin-bottom: 10px;
        }

        p {
            color: #cbd5e1;
        }

        .btn {
            margin-top: 20px;
            display: inline-block;
            padding: 12px 25px;
            background: #ef4444;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.3s;
        }

        .btn:hover {
            background: #dc2626;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>🏥 Sistema de Citas Médicas</h1>
    <p>Bienvenido al sistema de gestión de citas</p>

    <a href="/login" class="btn">Iniciar Sesión</a>
</div>

</body>
</html>