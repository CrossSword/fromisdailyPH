@extends('layout')
@section('title', 'Message')
@section('content')

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
                    <label class="form-label">Bias Member</label>
                    <select name="bias" class="form-select">
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
                            alert("Message submitted successfully"); // Display pop-up message
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
@endsection
