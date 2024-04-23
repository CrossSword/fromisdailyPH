<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FromisDailyPH</title>
    <!-- Favicon -->
    <link rel="icon" type="image/jpeg"
        href="https://pbs.twimg.com/profile_images/1650713583368695809/PMBHM5Pc_400x400.jpg">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        /* Fromis_9 Theme CSS */

        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url('https://pbs.twimg.com/media/FyvAkhdaQAEBWRQ?format=jpg&name=large');
            background-size: cover;
            background-position: center;
        }



        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            /* Background color with opacity for better readability */
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Header */
        header {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            /* Center the content */
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #ff2d20;
            /* Fromis_9 red color */
        }

        .navbar {
            list-style: none;
        }

        /* Form Styles */
        form {
            text-align: center;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.5); /* Adjust the alpha value */
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }


        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        select {
            width: calc(100% - 20px);
            /* Adjusted width calculation */
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="text"] {
            /* width: calc(100% - 20px); */
            /* Remove this line */
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            height: 150px;
            /* Set the height for the message box */
        }

        button {
            padding: 10px 20px;
            background-color: #ff2d20;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #d62919;
            /* Darker shade of red */
        }
    </style>

</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div>
        <form id="messageForm" action="{{ route('messagePost') }}" method="POST" class="ms-auto me-auto mt-auto"
            style="width: 500px">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Bias</label>
                <select name="bias member" class="form-select">
                    <option selected disabled>Choose...</option>
                    <option value="Lee Saerom">Lee Saerom</option>
                    <option value="Song Hayoung">Song Hayoung</option>
                    <option value="Park Jiwon">Park Jiwon</option>
                    <option value="Roh Jisun">Roh Jisun</option>
                    <option value="Lee Seoyeon">Lee Seoyeon</option>
                    <option value="Lee Chaeyoung">Lee Chaeyoung</option>
                    <option value="Lee Nagyung">Lee Nagyung</option>
                    <option value="Baek Jiheon">Baek Jiheon</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Message</label>
                <input type="text" class="form-control" name="message" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Add your JavaScript code here -->
    <script>
        document.getElementById('messageForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Get form data
            const formData = new FormData(this);

            // Send form data using AJAX
            fetch('{{ route('messagePost') }}', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message === "Message created successfully") {
                        alert("Message created successfully"); // Display pop-up message
                        // Reset form inputs
                        document.getElementById('messageForm').reset();
                    } else {
                        alert("Failed to create message"); // Display error message
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
</body>

</html>
