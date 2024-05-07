@extends('layout')
@section('title', 'Admin Page')
@section('content')
    <div class="container">
        <h3>Registrations</h3>
        <ul style="list-style-type: none;">
            @foreach ($registrations as $registration)
                <li style="margin-bottom: 20px;">
                    Name: {{ $registration->name }} <br>
                    Email: {{ $registration->email }} <br>
                    Contact Number: {{ $registration->contact_number }} <br>
                    Twitter Username: {{ $registration->twitter_username }} <br>
                    Facebook Link:
                    @if ($registration->facebook_link)
                        <a href="{{ $registration->facebook_link }}" target="_blank">{{ $registration->facebook_link }}</a>
                        <br>
                    @else
                        Not provided <br>
                    @endif
                    Ticket Type: {{ $registration->ticket_type }} <br>
                    Proof of payment:
                    @if ($registration->proof_of_payment)
                        <a href="{{ asset('storage/images/' . $registration->proof_of_payment) }}" download>Download
                            Image</a>
                    @else
                        No proof of payment uploaded
                    @endif
                </li>
            @endforeach
        </ul>


        <h3>Messages</h3>
        <ul style="list-style-type: none;">
            @foreach ($messages as $message)
                <li style="margin-bottom: 20px;">
                    Name: {{ $message->name }} <br>
                    Bias Member: {{ $message->bias }} <br>
                    Message: {{ $message->message }}
                </li>
            @endforeach
        </ul>
    </div>

    <script>
        function downloadImage(url) {
            var link = document.createElement('a');
            link.href = url;
            link.download = 'image.jpg';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    </script>
@endsection
