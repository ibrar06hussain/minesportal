<!DOCTYPE html>
<html>
<head>
    <title>Company Polygons</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Company Polygons</h1>
    <table>
        <thead>
            <tr>
                <th>Company Name</th>
                <th>Mineral Name</th>
                <th>Description</th>
                <th>District</th>
                <th>Status</th>
                <th>Granted Date</th>
                <th>Coordinates</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Area</th>
                <th>Scale</th>
                <th>Tenure</th>
            </tr>
        </thead>
        <tbody>
            @foreach($polygons as $polygon)
            <tr>
                <td>{{ $polygon->company_name }}</td>
                <td>{{ $polygon->mineral_name }}</td>
                <td>{{ $polygon->description }}</td>
                <td>{{ $polygon->district }}</td>
                <td>{{ $polygon->status }}</td>
                <td>{{ $polygon->granted_date }}</td>
                <td>{{ $polygon->coordinates }}</td>
                <td>{{ $polygon->contact }}</td>
                <td>{{ $polygon->address }}</td>
                <td>{{ $polygon->area }}</td>
                <td>{{ $polygon->scale }}</td>
                <td>{{ $polygon->tanure }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
