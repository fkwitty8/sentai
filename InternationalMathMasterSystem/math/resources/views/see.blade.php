<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
<style>
    body{
            background-color: #e0f7fa; /* Light blue background */
            
        }
    footer {
        background-color:#002366;
        padding: 20px 0;
        text-align: center;
    }
    .footer-content ul {
        list-style: none;
        padding: 0;
    }
    .footer-content ul li {
        display: inline;
        margin: 0 30px;
    }
    .footer-content ul li a {
        text-decoration: none;
        color: #ffffff;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Worst Performing Schools for {{ $CDetails[$id]}} Challenge </h2>
    <table class="table">
        <thead>
            <tr>
                <th>School Reg No</th>
                <th>Average Marks</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($worstPerfom as $record)
                <tr>
                    <td>{{ $record->SchoolRegNo }}</td>
                    <td>{{ $record->avMarks }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


<footer>
    <div class="footer-content">
        <ul>
            <li><a href="{{ url('/') }}">Back</a></li>
            <li><a href="{{ url('/schools') }}">School Analysis</a></li>
            <li><a href="{{ url('/PUPIL') }}">Pupil Analysis</a></li>
            <li><a href="{{ url('/about') }}">About</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
        </ul>
    </div>
</footer>
</body>
</html>