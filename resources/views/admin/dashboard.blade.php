<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nail Salon Admin Panel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            background: #f8f4f9;
        }

        .sidebar {
            width: 240px;
            height: 100vh;
            background: linear-gradient(180deg, #ff66b2, #ff99cc);
            color: white;
            padding: 20px;
            position: fixed;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        .sidebar ul li:hover {
            background: rgba(255,255,255,0.2);
        }

        .main {
            margin-left: 240px;
            padding: 20px;
            width: 100%;
        }

        .header {
            background: white;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-bottom: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .card h3 {
            margin-bottom: 10px;
            color: #444;
        }

        .card p {
            font-size: 24px;
            color: #ff4d94;
            font-weight: bold;
        }

        .top-actions {
            margin-bottom: 20px;
        }

        .table-box {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        table th {
            background: #ffe6f0;
        }

        .status {
            padding: 5px 10px;
            border-radius: 15px;
            color: white;
        }

        .confirmed { background: green; }
        .pending { background: orange; }
        .cancelled { background: red; }

        .btn {
            padding: 8px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            color: white;
            text-decoration: none;
            display: inline-block;
            margin: 2px;
        }

        .add { background: #28a745; }
        .edit { background: #007bff; }
        .delete { background: #dc3545; }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>💅 Admin</h2>
    <ul>
        <li>Dashboard</li>
        <li>Appointments</li>
        <li>Services</li>
        <li>Staff</li>
        <li>Customers</li>
        <li>Gallery</li>
        <li>Logout</li>
    </ul>
</div>

<div class="main">
    <div class="header">
        <h1>Welcome Admin</h1>
        <p>Nail Salon Management System</p>
    </div>

    <div class="cards">
        <div class="card">
            <h3>Appointments</h3>
            <p>25</p>
        </div>
        <div class="card">
            <h3>Services</h3>
            <p>10</p>
        </div>
        <div class="card">
            <h3>Staff</h3>
            <p>5</p>
        </div>
        <div class="card">
            <h3>Customers</h3>
            <p>40</p>
        </div>
    </div>

    <div class="top-actions">
        <a href="/admin/create" class="btn add">+ Add Appointment</a>
    </div>

    <div class="table-box">
        <h2>Recent Appointments</h2>
        <br>

        <table>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Service</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

            <tr>
                <td>1</td>
                <td>Sarah</td>
                <td>Manicure</td>
                <td>2026-04-10</td>
                <td><span class="status confirmed">Confirmed</span></td>
                <td>
                    <a href="/admin/edit" class="btn edit">Edit</a>
                    <button class="btn delete" onclick="showDeleteMessage()">Delete</button>
                </td>
            </tr>

            <tr>
                <td>2</td>
                <td>Emma</td>
                <td>Pedicure</td>
                <td>2026-04-11</td>
                <td><span class="status pending">Pending</span></td>
                <td>
                    <a href="/admin/edit" class="btn edit">Edit</a>
                    <button class="btn delete" onclick="showDeleteMessage()">Delete</button>
                </td>
            </tr>

            <tr>
                <td>3</td>
                <td>Olivia</td>
                <td>Nail Art</td>
                <td>2026-04-12</td>
                <td><span class="status cancelled">Cancelled</span></td>
                <td>
                    <a href="/admin/edit" class="btn edit">Edit</a>
                    <button class="btn delete" onclick="showDeleteMessage()">Delete</button>
                </td>
            </tr>
        </table>
    </div>
</div>

<script>
    function showDeleteMessage() {
        alert("Appointment deleted successfully!");
    }
</script>

</body>
</html>
