<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard </title>
</head>

<body>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Employee ID</th>
            <th>Designation </th>
            <th>Active </th>
            <th> Role </th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->designation }}</td>
                <td>{{ $user->is_active ? 'TRUE' : 'FALSE' }}</td>
                <td>{{ $user->role->name }}</td>
                <!--Button -->
                <td> Approve User </td>
                <!--modal-->
                <td> Assign Role </td>

            </tr>
        @endforeach

    </table>



</body>

</html>
