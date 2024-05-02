@extends('layout')
@section('title', 'CSE Registration')
@section('content')
    <!-- changes from htdocs-main -->
    <!-- Name, Email, Contact Number, Twitter username, Facebook link, ticket type (walkin or not), image submission (proof of payment) -->
    <div>
        <form action="{{ route('registrationPost') }}" method="POST" class="ms-auto me-auto mt-auto" style="width: 500px"
            id="registrationForm" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label-custom">Name</label>
                <input type="text" class="form-control-custom" name="name" required>
            </div>
            <div class="mb-3">
                <label class="form-label-custom">Email address</label>
                <input type="email" class="form-control-custom" name="email" id="email" required>
                <div id="emailError" class="text-danger-custom"></div> <!-- Display email error message -->
            </div>
            <div class="mb-3">
                <label class="form-label-custom">Contact Number</label>
                <input type="tel" class="form-control-custom" name="contact_number" required>
            </div>
            <div class="mb-3">
                <label class="form-label-custom">Twitter Username</label>
                <input type="text" class="form-control-custom" name="twitter_username" required>
            </div>
            <div class="mb-3">
                <label class="form-label-custom">Facebook Link</label>
                <input type="url" class="form-control-custom" name="facebook_link" required>
            </div>

            <!-- Ticket Type Selector -->
            <div class="mb-3">
                <label class="form-label-custom">Ticket Type</label>
                <div class="dropdown">
                    <select name="ticket_type" class="form-select">
                        <option selected disabled>Choose...</option>
                        <option value="non-walkin">Non-Walkin</option>
                    </select>
                </div>
            </div>

            <!-- Image Submission -->
            <div class="mb-3">
                <label for="formFile" class="form-label-custom">Proof of payment</label>
                <input class="form-control-custom" type="file" name="proof_of_payment" id="formFile" accept="image/*" required>
                <div id="fileError" class="text-danger-custom"></div> <!-- Display file type error message -->
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-submit-custom">Submit</button>
        </form>
    </div>

    <script>
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Validate file type
            let fileInput = document.getElementById('formFile');
            let file = fileInput.files[0];
            if (!file || !file.type.startsWith('image/')) {
                document.getElementById('fileError').textContent = 'Please select an image file.';
                return;
            } else {
                document.getElementById('fileError').textContent = '';
            }

            // Perform form submission via AJAX
            let formData = new FormData(this);
            fetch(this.action, {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (response.ok) {
                        // Reset form inputs
                        this.reset();
                        // Show pop-up message
                        alert('Registration submitted successfully.');
                    } else {
                        // Handle errors if any
                        alert('Registration failed. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again later.');
                });
        });
    </script>

@endsection
