<!DOCTYPE html>
<html>
<head>
    <title>Add Appointment</title>
    <style>
        body {
            font-family: Arial;
            background: #f8f4f9;
            padding: 40px;
        }

        .box {
            background: white;
            padding: 25px;
            border-radius: 10px;
            width: 400px;
            margin: auto;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 15px;
        }

        button {
            background: #ff4d94;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            width: 100%;
        }

        a {
            display: block;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Add Appointment</h2>

    <form onsubmit="showMessage(event)">
        <input type="text" placeholder="Customer Name" required>
        <input type="text" placeholder="Service" required>
        <input type="date" required>

        <select>
            <option>confirmed</option>
            <option>pending</option>
            <option>cancelled</option>
        </select>

        <button type="submit">Save</button>
    </form>

    <a href="/admin">Back</a>
</div>

<script>
    function showMessage(event){
        event.preventDefault();
        alert("Appointment Added!");
        window.location.href="/admin";
    }
</script>

</body>
</html>
