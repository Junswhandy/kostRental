<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="h-screen">
    <div class="flex h-full">
        <!-- Include sidebar -->
        @include('admin.template.sidebar')

        <!-- Dashboard content -->
        <div class="flex-1 p-4 text-white bg-slate-900">
            <!-- Konten dashboard lainnya -->
            <h1 class="text-2xl font-bold">Welcome to the Dashboard</h1>
            <!-- Tambahkan konten dashboard lainnya di sini -->
        </div>
    </div>
</body>
</html>
