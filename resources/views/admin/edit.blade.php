<!DOCTYPE html>
<html>
<head>
    <title>Edit Appointment</title>
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
            background: blue;
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
    <h2>Edit Appointment</h2>

    <form onsubmit="updateMessage(event)">
        <input type="text" value="Customer Name">
        <input type="text" value="Service">
        <input type="date">

        <select>
            <option>confirmed</option>
            <option>pending</option>
            <option>cancelled</option>
        </select>

        <button type="submit">Update</button>
    </form>

    <a href="/admin">Back</a>
</div>

<script>
    function updateMessage(event){
        event.preventDefault();
        alert("Appointment Updated!");
        window.location.href="/admin";
    }
</script>

</body>
</html>
