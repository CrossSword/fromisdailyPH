@extends('layout')
@section('title', 'CSE Registration')
@section('content')

    <!-- Name, Email, Contact Number, Twitter username, Facebook link, ticket type (walkin or not), image submission (proof of payment) -->
    <div>
        <form action="{{ route('registrationPost') }}" method="POST" class="ms-auto me-auto mt-auto" style="width: 500px"
            id="registrationForm">
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
                <div class="form-check-custom">
                    <input class="form-check-input-custom" type="radio" name="ticket_type" id="walkinTicket"
                        value="walkin">
                    <label class="form-check-label-custom" for="walkinTicket">Walkin</label>
                </div>
                <div class="form-check-custom">
                    <input class="form-check-input-custom" type="radio" name="ticket_type" id="nonWalkinTicket"
                        value="non-walkin">
                    <label class="form-check-label-custom" for="nonWalkinTicket">Non-Walkin</label>
                </div>
            </div>

            <!-- Image Submission -->
            <div class="mb-3">
                <label for="formFile" class="form-label-custom">Proof of payment</label>
                <input class="form-control-custom" type="file" id="formFile">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-submit-custom">Submit</button>
        </form>
    </div>

    <script>
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

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
