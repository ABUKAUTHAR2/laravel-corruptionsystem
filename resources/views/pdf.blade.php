<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Report PDF</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include any additional CSS styles here -->
    <style>
        /* Add custom styles here */
        body {
            background-color: #f7f7f7;
            padding: 20px;
        }
        .report-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="report-card">
            <h1 class="display-4">Report Details</h1>
            <div class="row">
                <div class="col-md-6">
                    <p class="lead"><strong>Name:</strong> {{ $report->name }}</p>
                    <p><strong>Email:</strong> {{ $report->email }}</p>
                    <p><strong>Region:</strong> {{ $report->region }}</p>
                    <p><strong>Organization:</strong> {{ $report->organization }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Incident:</strong> {{ $report->incident }}</p>
                    <!-- Add any other report details as needed -->
                </div>
            </div>
        </div>
        <h2>Attached Files</h2>
    @if (!empty($report->file_paths))
        <ul>
            @foreach (json_decode($report->file_paths) as $file)
                <li><a href="{{ asset('storage/files/' . $file) }}" target="_blank">{{ $file }}</a></li>
            @endforeach
        </ul>
    @else
        <p>No files attached to this report.</p>
    @endif

    </div>

    <!-- Include Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
