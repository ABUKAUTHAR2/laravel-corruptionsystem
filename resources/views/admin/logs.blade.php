
    @extends('layouts.app')
    @section('content')
    


    <style>
        /* Add your styles here */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .search-form {
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 28px;
            
        }
        /* Add more styles as needed */
    </style>
    <form action="/logs" method="get" class="search-form">

        <input type="text" id="search" name="search"  placeholder="SEARCH EMAIL" style="height: 28px;">
        <button type="submit" style="background-color: rgb(77, 83, 252); height: 28px;border: #f5f5f5;
        border-radius: 5px;">Search</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Event</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
                <tr>
                    <td>{{ $log['date'] }}</td>
                    <td>{{ $log['event'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection