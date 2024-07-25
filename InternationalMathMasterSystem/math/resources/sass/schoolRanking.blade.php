<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
    <thead>
        <tr>
            <th>Rank</th>
            <th>School Name</th>
            <th>Average Marks</th>
        </tr>
    </thead>
    <tbody>
        @php
            $rank = 1;
        @endphp
        @foreach ($averageMarks as $school)
        <tr>
            <td>{{ $rank }}</td>
            <td>{{ $school['SchoolName'] }}</td>
            <td>{{ $school['AverageMarks'] }}</td>
        </tr>
        @php
            $rank++;
        @endphp
        @endforeach

        
    </tbody>
</table>


</body>
</html>